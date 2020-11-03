<?php

use App\controller\UserController;

require __DIR__ . '/vendor/autoload.php';
$userController = new UserController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;
switch ($page) {
    case 'add':
        $userController->add();
        break;
    case 'delete':
        $userController->delete();
        break;
    case 'edit':
        $userController->edit();
        break;
    default:
        $userController->show();
        break;
}