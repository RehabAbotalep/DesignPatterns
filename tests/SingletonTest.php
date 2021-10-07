<?php

use Creational\Singleton\Singleton;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';

class SingletonTest extends TestCase
{
    public function testTheSame()
    {
        $obj1 = Singleton::getInstance();
        $obj2 = Singleton::getInstance();
        self::assertEquals($obj1, $obj2);
    }
}