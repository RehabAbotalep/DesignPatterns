<?php


namespace Structural\Decorator;


class Mocha extends CondimentDecorator
{
    private Beverage $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }

    public function getDescription(): string
    {
        return $this->beverage->getDescription() . " ,Mocha";
    }


    public function cost(): int
    {
        return $this->beverage->cost() + 2;
    }
}