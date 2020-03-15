<?php
/**
 * Created by PhpStorm.
 * User: Vitaliy
 * Date: 3/15/2020
 * Time: 9:42 AM
 */

namespace app;

use app\controller\UserController;


include("controller/UserController.php");

class Main
{
    public function start()
    {
        $userController = new  UserController();
        $userController->uploadFileCsv();

        /*
                $dataFields = ['firstName', 'lastName', 'birthDate', 'email', 'createdAt'];

                $data =
                    [
                        [
                            "firstName" => "wert",
                            "lastName" => "ad",
                            "birthDate" => "sd",
                            "email" => "45",
                            "createdAt" => "adfsg",
                        ],
                        [
                            "firstName" => "v",
                            "lastName" => "p",
                            "birthDate" => "d",
                            "email" => "dafgfh",
                            "createdAt" => "adfsgh",
                        ]
                    ];

                UserMapper::insertMultiple($dataFields, $data);*/
    }
}