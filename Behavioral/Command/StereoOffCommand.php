<?php


namespace Behavioral\Command;


class StereoOffCommand implements Command
{
    private Stereo $stereo;

    public function __construct(Stereo $stereo)
    {
        $this->stereo = $stereo;
    }

    public function execute(): string
    {
        return $this->stereo->off();
    }

    public function undo(): string
    {
        return $this->stereo->on();
    }
}