<?php
namespace Structural\Facade\HomeTheaterSystem;

class TheaterLights
{
    public function dim(int $percentage): string
    {
        return "Theater Ceiling Lights dimming to ".$percentage."%";
    }

    public function on()
    {
        return "Theater Ceiling Lights on";
    }
}