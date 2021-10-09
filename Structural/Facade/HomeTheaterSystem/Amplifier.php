<?php
namespace Structural\Facade\HomeTheaterSystem;

class Amplifier
{

    public function on(): string
    {
        return "Top-O-Line Amplifier on";
    }

    public function setDvd(string $dvd): string
    {
        return "Top-O-Line Amplifier setting DVD player to ".$dvd;
    }

    public function setSurroundSound(): string
    {
        return "Top-O-Line Amplifier surround sound on (5 speakers, 1 subwoofer)";

    }

    public function setVolume(int $volume): string
    {
        return "Top-O-Line Amplifier setting volume to ".$volume;
    }

    public function off(): string
    {
        return "Top-O-Line Amplifier off";
    }
}