<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\RoleUtils;
use PDO;

class AddUserCtrl
{
    public function action_addUserShow()
    {
        $this->generateView();
    }

    public function action_addUser()
    {
        $this->validate();

        if (!App::getMessages()->isError() && $this->checkUser()) {
            $query = "INSERT INTO `accounts` (`ID`, `users_id`, `saldo`, `acvite`) VALUES (NULL, NULL, '0', DEFAULT)";
            $sth = App::getDB()->pdo->prepare($query);

            $sth->execute();

            $query = "INSERT INTO `users` (`ID`, `id_roles`, `id_accounts`, `login`, `password`) VALUES (NULL, '2', (SELECT MAX(ID) FROM accounts), :login, PASSWORD(:password))";
            $sth = App::getDB()->pdo->prepare($query);

            $sth->bindParam(':login', $_POST['user'], PDO::PARAM_STR);
            $sth->bindParam(':password', $_POST['password'], PDO::PARAM_STR);

            $sth->execute();

            $query = "UPDATE `accounts` SET users_id = (SELECT MAX(ID) FROM `users`) where ID = (SELECT MAX(ID) FROM accounts)    ";
            $sth = App::getDB()->pdo->prepare($query);

            $sth->execute();

            App::getMessages()->addMessage(new Message('Użytkownik został dodany!', Message::INFO));
        } else if (!App::getMessages()->isMessage()) {
            App::getMessages()->addMessage(new Message('Podany użytkownik istnieje', Message::ERROR));
        }

        $this->generateView();
    }

    private function validate()
    {
        if (empty($_POST['user'])) {
            App::getMessages()->addMessage(new Message('Nie podano użytkownika', Message::ERROR));
        }

        if (empty($_POST['password'])) {
            App::getMessages()->addMessage(new Message('Nie podano hasła', Message::ERROR));
        }
    }

    private function generateView()
    {
        if (isset($_SESSION['login']) && RoleUtils::inRole("pracownik")) {
            try {
                App::getSmarty()->display('control panel/add user/addUser.tpl');
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


        return $sth->rowCount() == 0;
    }
}