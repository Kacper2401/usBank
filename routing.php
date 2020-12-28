<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('controlPanelShow'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('controlPanelShow', 'ControlPanelCtrl');
Utils::addRoute('logout', 'LoginCtrl');
Utils::addRoute('resetPasswordShow', 'ResetPasswordCtrl');
Utils::addRoute('resetPassword', 'ResetPasswordCtrl');
Utils::addRoute('transferPanelShow', 'TransferPanelCtrl');
Utils::addRoute('sendTransfer', 'TransferPanelCtrl');
Utils::addRoute('transferHistoryShow', 'TransferHistoryCtrl');

Utils::addRoute('closeShow', 'CloseCtrl');
Utils::addRoute('close', 'CloseCtrl');
Utils::addRoute('changePasswordShow', 'ChangePasswordCtrl');
Utils::addRoute('changePassword', 'ChangePasswordCtrl');
Utils::addRoute('addUserShow', 'AddUserCtrl');
Utils::addRoute('addUser', 'AddUserCtrl');
