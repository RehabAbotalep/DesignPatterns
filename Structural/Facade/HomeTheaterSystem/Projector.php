<?php
namespace Structural\Facade\HomeTheaterSystem;

class Projector
{
    public function on(): string
    {
        return "Top-O-Line Projector on";
    }

    public function wideScreenMode(): string
    {
        return "Top-O-Line Projector in widescreen mode (16x9 aspect ratio)";
    }

    public function off(): string
    {
        return "Top-O-Line Projector off";
    }
}