<?php
/**
 * Created by PhpStorm.
 * User: Vitaliy
 * Date: 3/15/2020
 * Time: 9:10 AM
 */

namespace app\db;

class DataMapper
{
    public static $db;

    public static function init($db)
    {
        self::$db = $db;
    }
}