<?php

namespace app\controllers;

use core\App;
use core\RoleUtils;
use PDO;

class ControlPanelCtrl
{
    public function action_controlPanelShow()
    {
        $this->generateView();
    }

    private function generateView()
    {
        if (isset($_SESSION['login']) && RoleUtils::inRole("uzytkownik")) {
            $_SESSION['saldo'] = $this->checkSaldo();
            try {
                App::getSmarty()->display('control panel/controlPanel.tpl');
            } catch (\SmartyException | \Exception $e) {
                echo "Błąd podczas wczytywania szablonu ->" . $e;
            }
        } else if (isset($_SESSION['login']) && RoleUtils::inRole("pracownik")) {
            try {
                App::getSmarty()->display('control panel/controlPanel.tpl');
            } catch (\SmartyException | \Exception $e) {
                echo "Błąd podczas wczytywania szablonu ->" . $e;
            }
        } else {
            header("Location: " . App::getConf()->action_url . "login");
        }
    }

    private function checkSaldo()
    {
        $query = "SELECT saldo from `accounts` join users u on u.ID = accounts.users_id where login = :login";
        $sth = App::getDB()->pdo->prepare($query);

        $sth->bindParam(':login', $_SESSION['login'], PDO::PARAM_STR);

        $sth->execute();

        $saldo = $sth->fetch();

        return $saldo['saldo'];
    }
}