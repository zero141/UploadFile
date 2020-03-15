<?php

namespace Tests\Unit;

use app\db\DataMapper;
use app\db\PDOConnection;
use app\db\UserMapper;
use PHPUnit\Framework\TestCase;

include_once "app/db/UserMapper.php";
include_once "app/db/PDOConnection.php";
include_once "app/db/DataMapper.php";

class UserMapperTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInsert()
    {
        $db = new PDOConnection();
        DataMapper::init($db);

        $data = [
            'firstName' => 'Top',
            'lastName' => 'User',
            'birthDate' => '2014-01-01',
            'email' => 'email@vk.com',
            'createdAt' => '2014-01-01 00:00:00'
        ];

        $userMapper = UserMapper::insert($data);

        $this->assertTrue($userMapper);

    }

    public function testInsertMultiple()
    {
        $db = new PDOConnection();
        DataMapper::init($db);

        $data =
            [
                [
                    'firstName' => 'Top',
                    'lastName' => 'User',
                    'birthDate' => '2014-01-01',
                    'email' => 'email@vk.com',
                    'createdAt' => '2014-01-01 00:00:00'
                ],
                [
                    'firstName' => 'Master',
                    'lastName' => 'React',
                    'birthDate' => '2014-01-01',
                    'email' => 'react@vk.com',
                    'createdAt' => '2017-01-01 00:00:00'
                ]
            ];

        $dataFields = ['firstName', 'lastName', 'birthDate', 'email', 'createdAt'];

        $userMapper = UserMapper::insertMultiple($dataFields, $data);

        $this->assertTrue($userMapper);

    }
}
