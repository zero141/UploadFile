<?php

namespace Tests\Unit;

use app\service\UserUpload;
use PHPUnit\Framework\TestCase;

include("app/service/UserUpload.php");
include("app/db/UserMapper.php");
include("app/db/PDOConnection.php");
include("app/db/DataMapper.php");

class UserUploadTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $fileName = 'file.csv';

        $userUpload = new UserUpload($fileName);

        $this->assertTrue($userUpload->make());
    }
}
