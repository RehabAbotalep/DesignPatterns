<?php
namespace Creational\Singleton;

class Singleton
{
    private static Singleton $uniqueInstance;

    private function __construct(){}

    public static function getInstance() :Singleton
    {
        if(!isset(self::$uniqueInstance))
        {
            self::$uniqueInstance = new Singleton();
        }
        return self::$uniqueInstance;
    }


}