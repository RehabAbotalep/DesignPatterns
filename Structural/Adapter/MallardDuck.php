<?php
namespace Structural\Adapter;

class MallardDuck implements Duck
{

    public function quack(): string
    {
        return "Quack";
    }

    public function fly(): string
    {
        return "I am flying";
    }
}