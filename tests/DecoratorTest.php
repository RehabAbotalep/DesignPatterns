<?php

use PHPUnit\Framework\TestCase;
use Structural\Decorator\Espresso;
use Structural\Decorator\Mocha;

require_once __DIR__ . '/../vendor/autoload.php';

class DecoratorTest extends TestCase
{
    private Espresso $espressoCoffee;

    protected function setUp(): void
    {
        $this->espressoCoffee = new Espresso();
    }

    public function testCanGetEspressoComponentWithOutAnyDecorators()
    {
        self::assertEquals(2, $this->espressoCoffee->cost());
        self::assertEquals('Espresso', $this->espressoCoffee->getDescription());
    }

    public function testCanGetEspressoComponentWithSingleMochaDecorator()
    {
        $espressoSingleMocha = new Mocha($this->espressoCoffee);
        self::assertEquals(4, $espressoSingleMocha->cost());
        self::assertEquals('Espresso ,Mocha', $espressoSingleMocha->getDescription());
    }

    public function testCanGetEspressoComponentWithDoubleMochaDecorator()
    {
        $espressoDoubleMocha = new Mocha(new Mocha($this->espressoCoffee));
        self::assertEquals(6, $espressoDoubleMocha->cost());
        self::assertEquals('Espresso ,Mocha ,Mocha', $espressoDoubleMocha->getDescription());
    }
}