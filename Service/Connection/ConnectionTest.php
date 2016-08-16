<?php

require_once "Connection.php";

/**
 * Created by PhpStorm.
 * User: lfelipeeb
 * Date: 16/08/16
 * Time: 14:36
 */
class ConnectionTest extends PHPUnit_Framework_TestCase
{
   private $db;

    public function setUp()
    {
        parent::setUp();
        $db = Connection::getInstace();
    }

    public function testFileExist()
    {
        $this->assertFileExists('mysql.ini');
    }
}
