<?php
/**
 * Created by PhpStorm.
 * User: Vitaliy
 * Date: 3/15/2020
 * Time: 9:06 AM
 */


use app\db\DataMapper;
use app\db\PDOConnection;
use app\Main;

include_once "app/db/PDOConnection.php";
include_once "app/db/DataMapper.php";
include_once "app/Main.php";

$db = new PDOConnection();
DataMapper::init($db);

$main = new Main();
$main->start();



