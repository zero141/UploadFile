<?php

namespace Tests\Unit;

use app\db\PDOConnection;
use app\service\UserUpload;
use PHPUnit\Framework\TestCase;

include_once "app/service/UserUpload.php";

class UserUploadTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpload()
    {
        $userUpload = new UserUpload('file.csv');
        $this->assertTrue($userUpload->make());
    }
}
