<?php


namespace Behavioral\Command;


class GarageDoorOpenCommand implements Command
{

    private GarageDoor $door;

    public function __construct(GarageDoor $door)
    {
       $this->door = $door;
    }

    public function execute(): string
    {
        return $this->door->open();
    }

    public function undo(): string
    {
        return $this->door->close();
    }
}