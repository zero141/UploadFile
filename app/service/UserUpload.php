<?php

/**
 * Created by PhpStorm.
 * User: Vitaliy
 * Date: 3/15/2020
 * Time: 10:45 AM
 */

namespace app\service;

use app\db\UserMapper;

include_once "app/db/UserMapper.php";

class UserUpload
{
    private $fileName;

    function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function make()
    {
        return $this->read();
    }

    private function read()
    {
        $res = [];
        $i = 0;

        $handle = fopen($this->fileName, "r");
        while ($csvLine = fgetcsv($handle, 1000, ",")) {

            $i++;
            $res []= [
                'firstName' => $csvLine[0],
                'lastName' => $csvLine[1],
                'birthDate' => $csvLine[2],
                'email' => $csvLine[2],
                'createdAt' => $csvLine[2]
            ];


            if ($i >= 10) {
                $this->insert($res);
                $i = 0;
                $res = [];
                return false;
            }
        }

        return true;
    }

    private function insert($data)
    {
        $dataFields = ['firstName', 'lastName', 'birthDate', 'email', 'createdAt'];
        UserMapper::insertMultiple($dataFields, $data);
    }

}