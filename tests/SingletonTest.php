<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Creational\Singleton\Singleton;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    public function testOneAndOnlyOneObjectIsInstantiatedFromSingletonClass()
    {
        $obj1 = Singleton::getInstance();
        $obj2 = Singleton::getInstance();
        self::assertEquals($obj1, $obj2);
    }
}