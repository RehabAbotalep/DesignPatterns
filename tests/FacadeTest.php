<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Structural\Facade\HomeTheaterFacade;
use Structural\Facade\HomeTheaterSystem\Amplifier;
use Structural\Facade\HomeTheaterSystem\DVDPlayer;
use Structural\Facade\HomeTheaterSystem\PopcornPopper;
use Structural\Facade\HomeTheaterSystem\Projector;
use Structural\Facade\HomeTheaterSystem\Screen;
use Structural\Facade\HomeTheaterSystem\TheaterLights;
use Structural\Facade\HomeTheaterSystem\Tuner;

class FacadeTest extends TestCase
{
    private HomeTheaterFacade $homeTheater;

    protected function setUp(): void
    {   
        $amp = new Amplifier();
        $tuner = new Tuner();
        $dvd = new DVDPlayer();
        $projector = new Projector();
        $screen = new Screen();
        $lights = new TheaterLights();
        $popper = new PopcornPopper();
        $this->homeTheater = new HomeTheaterFacade($amp, $tuner, $dvd, $projector, $screen, $lights, $popper);
    }
    
    public function testCanWatchMovie()
    {
        $expectedOut =  "Get Ready to watch a movie ...".
                        "Popcorn Popper on".
                        "Popcorn Popper popping popcorn!".
                        "Theater Ceiling Lights dimming to 10%".
                        "Theater Screen going down".
                        "Top-O-Line Projector on".
                        "Top-O-Line Projector in widescreen mode (16x9 aspect ratio)".
                        "Top-O-Line Amplifier on".
                        "Top-O-Line Amplifier setting DVD player to Dvd".
                        "Top-O-Line Amplifier setting volume to 5".
                        "Top-O-Line DVD Player on".
                        "Top-O-Line DVD Player playing POWER";

        self::assertEquals($expectedOut, $this->homeTheater->watchMovie("POWER"));
    }

    public function testCanEndMovie()
    {
        $expectedOut =  "Shutting movie theater down...".
                        "Popcorn Popper off".
                        "Theater Screen going up".
                        "Top-O-Line Projector off".
                        "Top-O-Line Amplifier off".
                        "Top-O-Line DVD Player stopped".
                        "Top-O-Line DVD Player eject".
                        "Top-O-Line DVD Player off";
        self::assertEquals($expectedOut, $this->homeTheater->endMovie());
    }
}