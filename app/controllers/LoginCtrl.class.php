<?php

namespace app\controllers;

use app\forms\LoginForm;
use core\App;
use core\Message;
use core\ParamUtils;
use core\RoleUtils;
use PDO;

class LoginCtrl
{
    private $form;

    public function __construct()
    {
        $this->form = new LoginForm();
    }

    public function action_login()
    {
        $this->getParams();

        if ($this->validate()) {
            header("Location: " . App::getConf()->app_url . "/controlPanelShow");
        } else {
            $this->generateView();
        }

    }

    public function action_logout()
    {
        session_destroy();
        App::getMessages()->addMessage(new Message('Poprawnie wylogowano z systemu', Message::INFO));

        $this->generateView();
    }

    private function getParams()
    {
        $this->form->login = ParamUtils::getFromPost('login');
        $this->form->pass = ParamUtils::getFromPost('password');
    }

    private function validate(): bool
    {

        if (!(isset ($this->form->login) && isset ($this->form->pass))) {
            return false;
        }

        if (!App::getMessages()->isError()) {
            if ($this->form->login == "") {
                App::getMessages()->addMessage(new Message('Nie podano loginu', Message::ERROR));
            }
            if ($this->form->pass == "") {
                App::getMessages()->addMessage(new Message('Nie podano hasła', Message::ERROR));
            }
        }

        if (!App::getMessages()->isError() && !$this->checkIfUserExist()) {
            App::getMessages()->addMessage(new Message('Niepoprawny login lub hasło', Message::ERROR));
        }

        return !App::getMessages()->isError();
    }

    private function generateView()
    {
        try {
            App::getSmarty()->display('login/login.tpl');
        } catch (\SmartyException | \Exception $e) {
            echo "Błąd podczas wczytywania szablonu ->" . $e;
        }
    }

    private function checkIfUserExist(): bool
    {

        $query = "SELECT users.ID, login, roles.name as role FROM users LEFT JOIN roles on roles.ID = users.id_roles LEFT JOIN accounts on accounts.users_id = users.ID WHERE login = :login AND password = PASSWORD(:password) AND (accounts.acvite = 'Y' OR users.id_accounts IS NULL)";
        $sth = App::getDB()->pdo->prepare($query);

        $sth->bindParam(':login', $this->form->login, PDO::PARAM_STR);
        $sth->bindParam(':password', $this->form->pass, PDO::PARAM_STR);

        $sth->execute();

        if ($sth->rowCount() == 1) {
            $account = $sth->fetch(PDO::FETCH_ASSOC);

            $_SESSION['userId'] = $account['ID'];
            $_SESSION['login'] = $account['login'];
            $_SESSION['role'] = $account['role'];

            RoleUtils::addRole($account['role']);

            return true;
        } else {
            return false;
        }
    }
}