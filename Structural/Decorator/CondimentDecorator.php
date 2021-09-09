<?php


namespace Structural\Decorator;


abstract class CondimentDecorator extends Beverage
{
    abstract public function cost(): int;
}