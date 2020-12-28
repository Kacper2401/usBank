<?php

namespace app\controllers;

use core\App;
use core\RoleUtils;
use PDO;

class TransferHistoryCtrl
{
    public function action_transferHistoryShow()
    {
        $this->downloadData();
        $this->generateView();
    }

    private function generateView()
    {
        if (isset($_SESSION['login']) && RoleUtils::inRole("uzytkownik")) {
            try {
                App::getSmarty()->display('control panel/transfer history/transferHistory.tpl');
            } catch (\SmartyException | \Exception $e) {
                echo "Błąd podczas wczytywania szablonu ->" . $e;
            }
        } else {
            header("Location: " . App::getConf()->action_url . "login");
        }
    }

    private function downloadData()
    {
        $query = "SELECT `login`,`value`,`title`,`date`,`description` FROM transactions INNER JOIN users ON transactions.to_user_id = users.ID WHERE from_user_id = :userId ORDER BY date DESC";
        $sth = App::getDB()->pdo->prepare($query);

        $sth->bindParam(':userId', $_SESSION['userId'], PDO::PARAM_INT);

        $sth->execute();

        $historyTo = $sth->fetchAll(PDO::FETCH_ASSOC);
        App::getSmarty()->assign("recordsTo", $historyTo);

        $query = "SELECT `login`,`value`,`title`,`date`,`description` FROM transactions INNER JOIN users ON transactions.from_user_id = users.ID WHERE to_user_id = :userId ORDER BY date DESC";
        $sth = App::getDB()->pdo->prepare($query);

        $sth->bindParam(':userId', $_SESSION['userId'], PDO::PARAM_INT);

        $sth->execute();
        $historyFrom = $sth->fetchAll(PDO::FETCH_ASSOC);
        App::getSmarty()->assign("recordsFrom", $historyFrom);
    }
}