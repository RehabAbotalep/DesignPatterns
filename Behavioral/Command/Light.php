<?php
namespace Behavioral\Command;

class Light
{
    public function on(): string
    {
        return "Light is on ";
    }

    public function off(): string
    {
        return "Light is off ";
    }
}