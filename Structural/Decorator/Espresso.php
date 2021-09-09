<?php


namespace Structural\Decorator;


class Espresso extends Beverage
{
    public function __construct()
    {
        $this->description = "Espresso";
    }

    public function cost(): int
    {
        return 2;
    }
}