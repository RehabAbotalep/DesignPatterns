<?php
namespace Structural\Facade\HomeTheaterSystem;

class PopcornPopper
{
    public function on(): string
    {
        return "Popcorn Popper on";
    }

    public function pop(): string
    {
        return "Popcorn Popper popping popcorn!";
    }

    public function off(): string
    {
        return "Popcorn Popper off";
    }
}