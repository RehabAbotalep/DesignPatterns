<?php


namespace Behavioral\Command;


class GarageDoorCloseCommand implements Command
{
    private GarageDoor $door;

    public function __construct(GarageDoor $door)
    {
        $this->door = $door;
    }

    public function execute(): string
    {
        return $this->door->close();
    }

    public function undo(): string
    {
        return $this->door->open();
    }
}