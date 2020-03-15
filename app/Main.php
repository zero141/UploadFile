<?php
/**
 * Created by PhpStorm.
 * User: Vitaliy
 * Date: 3/15/2020
 * Time: 9:42 AM
 */

namespace app;

use app\controller\UserController;


include_once "controller/UserController.php";

class Main
{
    public function start()
    {
        $userController = new  UserController();
        $userController->uploadFileCsv();
    }
}