<?php

namespace app\controllers;

use app\forms\Transfer;
use core\App;
use core\Message;
use core\ParamUtils;
use core\RoleUtils;
use PDO;

class TransferPanelCtrl
{
    private $form;

    public function __construct()
    {
        $this->form = new Transfer();
    }

    public function action_transferPanelShow()
    {
        $this->generateView();
    }

    public function action_sendTransfer()
    {
        $this->getParams();

        if ($this->validate()) {
            $this->doTransfer();
            App::getMessages()->addMessage(new Message('Przelew został wykonany!', Message::INFO));
        }

        $this->generateView();
    }

    private function getParams()
    {
        $this->form->description = ParamUtils::getFromPost('description');
        $this->form->title = ParamUtils::getFromPost('title');
        $this->form->toUser = ParamUtils::getFromPost('toUser');
        $this->form->value = ParamUtils::getFromPost('value');
    }

    private function generateView()
    {
        if (isset($_SESSION['login']) && RoleUtils::inRole("uzytkownik")) {
            try {
                App::getSmarty()->display('control panel/transfer panel/transferPanel.tpl');
            } catch (\SmartyException | \Exception $e) {
                echo "Błąd podczas wczytywania szablonu ->" . $e;
            }
        } else {
            header("Location: " . App::getConf()->action_url . "login");
        }
    }

    private function validate(): bool
    {
        if (empty($this->form->title)) {
            App::getMessages()->addMessage(new Message('Nie podano tytułu', Message::ERROR));
        }

        if (!$this->checkAmount()) {
            App::getMessages()->addMessage(new Message('Nie masz wystarczająco środków', Message::ERROR));
        }

        if (!$this->checkUser()) {
            App::getMessages()->addMessage(new Message('Podano błędną nazwe użytkownika', Message::ERROR));
        }
        if (strcmp($this->form->toUser, $_SESSION['login']) == 0) {
            App::getMessages()->addMessage(new Message('Nie można zrobić przelewu do samego siebie', Message::ERROR));
        }

        return !App::getMessages()->isMessage();
    }

    private function checkAmount(): bool
    {
        $query = "SELECT saldo FROM accounts JOIN users u on u.ID = accounts.users_id WHERE `u`.`login` = :login";
        $sth = App::getDB()->pdo->prepare($query);

        $sth->bindParam(':login', $_SESSION['login'], PDO::PARAM_STR);

        $sth->execute();

        $balance = $sth->fetch(PDO::FETCH_ASSOC);

        return $balance['saldo'] - $this->form->value >= 0;
    }

    private function checkUser(): bool
    {
        $query = "SELECT ID FROM users WHERE login = :login";
        $sth = App::getDB()->pdo->prepare($query);

        $sth->bindParam(':login', $this->form->toUser, PDO::PARAM_STR);

        $sth->execute();

        $userId = $sth->fetch(PDO::FETCH_ASSOC);

        $_SESSION['toUserId'] = $userId['ID'];

        return $sth->rowCount() == 1;
    }

    private function doTransfer()
    {
        $query = "INSERT INTO transactions VALUES (NULL , :fromUser, :toUser, :value, :title, NOW(), :description)";
        $sth = App::getDB()->pdo->prepare($query);

        $sth->bindParam(':fromUser', $_SESSION['userId'], PDO::PARAM_INT);
        $sth->bindParam(':toUser', $_SESSION['toUserId'], PDO::PARAM_INT);
        $sth->bindParam(':value', $this->form->value, PDO::PARAM_STR);
        $sth->bindParam(':title', $this->form->title, PDO::PARAM_STR);
        $sth->bindParam(':description', $this->form->description, PDO::PARAM_STR);

        $sth->execute();

        $this->updateSaldo();
    }

    private function updateSaldo()
    {
        $query = "UPDATE accounts set saldo = saldo - :value where users_id = :userId";
        $sth = App::getDB()->pdo->prepare($query);

        $sth->bindParam(':value', $this->form->value, PDO::PARAM_STR);
        $sth->bindParam(':userId', $_SESSION['userId'], PDO::PARAM_INT);

        $sth->execute();

        $query = "UPDATE accounts set saldo = saldo + :value where users_id = :userId";
        $sth = App::getDB()->pdo->prepare($query);

        $sth->bindParam(':value', $this->form->value, PDO::PARAM_STR);
        $sth->bindParam(':userId', $_SESSION['toUserId'], PDO::PARAM_INT);

        $sth->execute();
    }
}