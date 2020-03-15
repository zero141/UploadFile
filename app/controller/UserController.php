<?php
/**
 * Created by PhpStorm.
 * User: Vitaliy
 * Date: 3/15/2020
 * Time: 10:41 AM
 */

namespace app\controller;

include("app/service/UserUpload.php");
use app\service\UserUpload;

class UserController
{
    public function uploadFileCsv($fileName = 'file.csv')
    {
        $userUpload = new UserUpload($fileName);
        $userUpload->make();
    }
}