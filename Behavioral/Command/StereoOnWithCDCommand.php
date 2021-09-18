<?php


namespace Behavioral\Command;


class StereoOnWithCDCommand implements Command
{

    private Stereo $stereo;

    public function __construct(Stereo $stereo)
    {
        $this->stereo = $stereo;
    }

    public function execute()
    {
        return $this->stereo->on() .
               $this->stereo->setCd() .
               $this->stereo->setVolume(11);
    }

    public function undo()
    {
        return $this->stereo->off();
    }
}