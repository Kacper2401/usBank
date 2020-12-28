<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\RoleUtils;
use PDO;

class CloseCtrl
{
    public function action_closeShow()
    {
        $this->generateView();
    }

    public function action_close()
    {
        $this->validate();

        if ($this->checkUser()) {
            $query = "UPDATE accounts set acvite = 'N' where users_id = (SELECT ID FROM users WHERE login = :login)";
            $sth = App::getDB()->pdo->prepare($query);

            $sth->bindParam(':login', $_POST['user'], PDO::PARAM_STR);
            $sth->bindParam(':login', $_POST['user'], PDO::PARAM_STR);

            $sth->execute();
            App::getMessages()->addMessage(new Message('Konto zostało zamknięte!', Message::INFO));
        } else if (!App::getMessages()->isMessage()) {
            App::getMessages()->addMessage(new Message('Podany użytkownik nie istnieje', Message::ERROR));
        }

        $this->generateView();
    }

    private function validate()
    {
        if (empty($_POST['user'])) {
            App::getMessages()->addMessage(new Message('Nie podano użytkownika', Message::ERROR));
        }
    }

    private function generateView()
    {
        if (isset($_SESSION['login']) && RoleUtils::inRole("pracownik")) {
            try {
                App::getSmarty()->display('control panel/delete panel/deletePanel.tpl');
            } catch (\SmartyException | \Exception $e) {
                echo "Błąd podczas wczytywania szablonu ->" . $e;
            }
        } else {
            header("Location: " . App::getConf()->action_url . "login");
        }
    }

    private function checkUser(): bool
    {
        $query = "SELECT accounts.ID FROM accounts JOIN users u on accounts.users_id = u.ID WHERE login = :login";
        $sth = App::getDB()->pdo->prepare($query);

        $sth->bindParam(':login', $_POST['user'], PDO::PARAM_STR);

        $sth->execute();


        return $sth->rowCount() == 1;
    }
}