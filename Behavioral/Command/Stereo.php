<?php


namespace Behavioral\Command;


class Stereo
{
    public function on(): string
    {
        return "Stereo is on, ";
    }

    public function setCd(): string
    {
        return "Cd is set, ";
    }

    public function setVolume($volume): string
    {
        return "Volume is set to ". $volume;
    }

    public function off(): string
    {
        return "Stereo is off";
    }
}