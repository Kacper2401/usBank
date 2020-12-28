<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\RoleUtils;
use PDO;

class ChangePasswordCtrl
{
    public function action_changePasswordShow()
    {
        $this->generateView();
    }

    public function action_changePassword()
    {
        $this->validate();

        if (!App::getMessages()->isError() && $this->checkUser()) {
            $query = "UPDATE users SET `password` = PASSWORD(:password) where login = :login";
            $sth = App::getDB()->pdo->prepare($query);

            $sth->bindParam(':login', $_POST['user'], PDO::PARAM_STR);
            $sth->bindParam(':password', $_POST['newPassword'], PDO::PARAM_STR);

            $sth->execute();
            App::getMessages()->addMessage(new Message('Hasło zostało zmienione!', Message::INFO));
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

        if (empty($_POST['newPassword'])) {
            App::getMessages()->addMessage(new Message('Nie podano nowego hasła', Message::ERROR));
        }
    }

    private function generateView()
    {
        if (isset($_SESSION['login']) && RoleUtils::inRole("pracownik")) {
            try {
                App::getSmarty()->display('control panel/change password/changePassword.tpl');
            } catch (\SmartyException | \Exception $e) {
                echo "Błąd podczas wczytywania szablonu ->" . $e;
            }
        } else {
            header("Location: " . App::getConf()->action_url . "login");
        }
    }

    private function checkUser(): bool
    {
        $query = "SELECT accounts.ID FROM accounts JOIN users u on accounts.users_id = u.ID WHERE login = :login AND u.id_roles != 1";
        $sth = App::getDB()->pdo->prepare($query);

        $sth->bindParam(':login', $_POST['user'], PDO::PARAM_STR);

        $sth->execute();


        return $sth->rowCount() == 1;
    }
}