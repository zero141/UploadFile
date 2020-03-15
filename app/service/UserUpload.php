<?php

/**
 * Created by PhpStorm.
 * User: Vitaliy
 * Date: 3/15/2020
 * Time: 10:45 AM
 */


namespace app\service;

use app\db\UserMapper;
use Rakit\Validation\Validator;

require('vendor/autoload.php');

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

    private function validation($csvLine)
    {
        $validator = new Validator;

        $validation = $validator->make($csvLine, [
            '0' => 'required',
            '1' => 'required',
            '2' => 'required|date:Y-m-d',
            '3' => 'required|email',
            '4' => 'required|date:Y-m-d',
        ]);

        $validation->validate();

        return $validation;
    }

    private function read()
    {
        $res = [];
        $i = 0;

        $handle = fopen($this->fileName, "r");
        while ($csvLine = fgetcsv($handle, 1000, ",")) {

            $validation = $this->validation($csvLine);

            if ($validation->fails()) {
                return false;
            }

            $i++;
            $res [] = [
                'firstName' => $csvLine[0],
                'lastName' => $csvLine[1],
                'birthDate' => $csvLine[2],
                'email' => $csvLine[3],
                'createdAt' => $csvLine[4]
            ];


            if ($i >= 10) {
                $this->insert($res);
                $i = 0;
                $res = [];
                //  return false;
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