<?php


namespace Behavioral\Command;


class LightOffCommand implements Command
{
    private Light $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): string
    {
        return $this->light->off();
    }

    public function undo(): string
    {
        return $this->light->on();
    }
}