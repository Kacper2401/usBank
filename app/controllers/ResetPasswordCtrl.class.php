<?php

namespace app\controllers;

use app\forms\NewPasswordForm;
use core\App;
use core\Message;
use core\ParamUtils;
use core\RoleUtils;
use PDO;

class ResetPasswordCtrl
{
    private $form;

    public function __construct()
    {
        $this->form = new NewPasswordForm();
    }

    public function action_resetPasswordShow()
    {
        $this->generateView();
    }

    public function action_resetPassword()
    {
        if (isset($_SESSION['login']) && RoleUtils::inRole("uzytkownik")) {
            $this->setNewPassword();
            $this->generateView();
        } else {
            header("Location: " . App::getConf()->action_url . "login");
        }
    }

    private function getParams()
    {
        $this->form->newPassword = ParamUtils::getFromPost('newPassword');
        $this->form->oldPassword = ParamUtils::getFromPost('oldPassword');
    }

    private function generateView()
    {
        if (isset($_SESSION['login']) && RoleUtils::inRole("uzytkownik")) {
            try {
                App::getSmarty()->display('control panel/reset password/resetPassword.tpl');
            } catch (\SmartyException | \Exception $e) {
                echo "Błąd podczas wczytywania szablonu ->" . $e;
            }
        } else {
            header("Location: " . App::getConf()->action_url . "login");
        }
    }

    private function setNewPassword()
    {
        $this->getParams();
        $this->checkOldPassword();

        if ($this->checkNewPassword() && $this->checkOldPassword()) {
            $query = "UPDATE `users` set `password` = PASSWORD(:newPassword) where `login` = :login";
            $sth = App::getDB()->pdo->prepare($query);

            $sth->bindParam(':newPassword', $this->form->newPassword, PDO::PARAM_STR);
            $sth->bindParam(':login', $_SESSION['login'], PDO::PARAM_STR);

            $sth->execute();

            App::getMessages()->addMessage(new Message('Hasło zostało zmienione!', Message::INFO));
        }
    }

    private function checkNewPassword(): bool
    {
        if (strcmp($this->form->oldPassword, $this->form->newPassword) == 0 && !empty($this->form->oldPassword) && !empty($this->form->newPassword)) {
            App::getMessages()->addMessage(new Message('Hasła nie mogą być identyczne', Message::ERROR));
            return false;
        }

        if (empty($this->form->oldPassword) || empty($this->form->newPassword)) {
            App::getMessages()->addMessage(new Message('Wszystkie pola muszą być uzupełnione', Message::ERROR));
            return false;
        }

        return true;
    }

    private function checkOldPassword(): bool
    {
        $query = "SELECT ID from `users` where `password` = PASSWORD(:oldPassword) AND `login` = :login";
        $sth = App::getDB()->pdo->prepare($query);

        $sth->bindParam(':oldPassword', $this->form->oldPassword, PDO::PARAM_STR);
        $sth->bindParam(':login', $_SESSION['login'], PDO::PARAM_STR);

        $sth->execute();

        if ($sth->rowCount() == 1) {
            return true;
        } else {
            App::getMessages()->addMessage(new Message('Podano złe hasło', Message::ERROR));
            return false;
        }
    }
}