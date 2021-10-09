<?php
namespace Structural\Facade\HomeTheaterSystem;

class DVDPlayer
{
    public function on(): string
    {
        return "Top-O-Line DVD Player on";
    }

    public function play(string $movie): string
    {
        return "Top-O-Line DVD Player playing " . $movie;
    }

    public function stop(): string
    {
        return "Top-O-Line DVD Player stopped";
    }

    public function eject(): string
    {
        return "Top-O-Line DVD Player eject";
    }

    public function off(): string
    {
        return "Top-O-Line DVD Player off";
    }
}