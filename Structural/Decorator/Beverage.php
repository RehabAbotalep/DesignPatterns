<?php

namespace Structural\Decorator;

abstract class Beverage
{
    public string $description = 'Beverage';

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public abstract function cost(): int;
}