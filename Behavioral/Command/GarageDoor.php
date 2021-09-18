<?php


namespace Behavioral\Command;


class GarageDoor
{
    public function open(): string
    {
        return "Garage door is opened ";
    }

    public function close(): string
    {
        return "Garage door is closed ";
    }
}