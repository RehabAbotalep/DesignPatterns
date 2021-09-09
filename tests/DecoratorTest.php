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
        self::assertEquals($this->espressoCoffee->cost(), 2);
        self::assertEquals($this->espressoCoffee->getDescription(), 'Espresso');
    }

    public function testCanGetEspressoComponentWithSingleMochaDecorator()
    {
        $espressoSingleMocha = new Mocha($this->espressoCoffee);
        self::assertEquals($espressoSingleMocha->cost(), 4);
        self::assertEquals($espressoSingleMocha->getDescription(), 'Espresso ,Mocha');
    }

    public function testCanGetEspressoComponentWithDoubleMochaDecorator()
    {
        $espressoDoubleMocha = new Mocha(new Mocha($this->espressoCoffee));
        self::assertEquals($espressoDoubleMocha->cost(), 6);
        self::assertEquals($espressoDoubleMocha->getDescription(), 'Espresso ,Mocha ,Mocha');
    }
}