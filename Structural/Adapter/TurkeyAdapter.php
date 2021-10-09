<?php


namespace Structural\Adapter;


class TurkeyAdapter implements Duck
{
    private Turkey $turkey;

    public function __construct(Turkey $turkey)
    {
        $this->turkey = $turkey;
    }

    public function quack()
    {
        return $this->turkey->gobble();
    }

    public function fly(): string
    {
        return $this->turkey->fly();
    }
}