<?php
namespace Structural\Facade;

use Structural\Facade\HomeTheaterSystem\Amplifier;
use Structural\Facade\HomeTheaterSystem\DVDPlayer;
use Structural\Facade\HomeTheaterSystem\PopcornPopper;
use Structural\Facade\HomeTheaterSystem\Projector;
use Structural\Facade\HomeTheaterSystem\Screen;
use Structural\Facade\HomeTheaterSystem\TheaterLights;
use Structural\Facade\HomeTheaterSystem\Tuner;

class HomeTheaterFacade
{
    private Amplifier $amp;
    private Tuner $tuner;
    private DvdPlayer $dvd;
    private Projector $projector;
    private Screen $screen;
    private TheaterLights $lights;
    private PopcornPopper $popper;

    public function __construct(Amplifier $amp, Tuner $tuner, DvdPlayer $dvd,
                                Projector $projector, Screen $screen,
                                TheaterLights $lights, PopcornPopper $popper)
    {
        $this->amp = $amp;
        $this->tuner = $tuner;
        $this->dvd = $dvd;
        $this->projector = $projector;
        $this->screen = $screen;
        $this->lights = $lights;
        $this->popper = $popper;
    }

    public function watchMovie(string $movie)
    {
          return "Get Ready to watch a movie ...".
              $this->popper->on().
              $this->popper->pop().
              $this->lights->dim(10).
              $this->screen->down().
              $this->projector->on().
              $this->projector->wideScreenMode().
              $this->amp->on().
              $this->amp->setDvd("Dvd").
              $this->amp->setVolume(5).
              $this->dvd->on().
              $this->dvd->play($movie);

    }

    public function endMovie(): string
    {
        return "Shutting movie theater down...".
                $this->popper->off().
                $this->screen->up().
                $this->projector->off().
                $this->amp->off().
                $this->dvd->stop().
                $this->dvd->eject().
                $this->dvd->off();
    }
}