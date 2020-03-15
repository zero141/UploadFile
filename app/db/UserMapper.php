<?php
/**
 * Created by PhpStorm.
 * User: Vitaliy
 * Date: 3/15/2020
 * Time: 9:10 AM
 */

namespace app\db;

class UserMapper extends DataMapper
{
    public static function insert($data)
    {
        $sql = "INSERT INTO users(firstName, lastName, birthDate, email, createdAt) VALUES(:firstName,:lastName,:birthDate,:email,:createdAt)";
        $stmt = self::$db->prepare($sql);
        $stmt->execute($data);
    }

    public static function insertMultiple($dataFields, $data)
    {
        self::$db->beginTransaction(); // also helps speed up your inserts.
        $insert_values = [];
        foreach ($data as $d) {
            $questionMarks[] = '(' . self::placeholders('?', sizeof($d)) . ')';
            $insert_values = array_merge($insert_values, array_values($d));
        }

        $sql = "INSERT INTO users (" . implode(",", $dataFields) . ") VALUES " .
            implode(',', $questionMarks);


        $stmt = self::$db->prepare($sql);
        try {
            $stmt->execute($insert_values);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        self::$db->commit();
    }

    private function placeholders($text, $count = 0, $separator = ",")
    {
        $result = array();
        if ($count > 0) {
            for ($x = 0; $x < $count; $x++) {
                $result[] = $text;
            }
        }

        return implode($separator, $result);
    }

}