<?php

namespace Tests\Unit;

use app\db\PDOConnection;
use PHPUnit\Framework\TestCase;

include_once "app/db/PDOConnection.php";

class PDOConnectionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testConnection()
    {
        $db = new PDOConnection();
        $this->assertNull($db->errorCode());
    }
}
