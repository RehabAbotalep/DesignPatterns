<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Structural\Adapter\DuckAdapter;
use Structural\Adapter\MallardDuck;
use Structural\Adapter\TurkeyAdapter;
use Structural\Adapter\WildTurkey;

class AdapterTest extends TestCase
{

    public function testTurkeyAdapterAdaptTurkeyToDuck()
    {
        $turkey = new WildTurkey();
        $turkeyAdapter = new TurkeyAdapter($turkey);
        self::assertEquals("Gobble gobble", $turkeyAdapter->quack());
        self::assertEquals("I’m flying a short distance", $turkeyAdapter->fly());
    }

    public function testDuckAdapterAdaptDuckToTurkey()
    {
        $duck = new MallardDuck();
        $duckAdapter = new DuckAdapter($duck);
        self::assertEquals("Quack", $duckAdapter->gobble());
        self::assertEquals("I am flying", $duckAdapter->fly());
    }
}