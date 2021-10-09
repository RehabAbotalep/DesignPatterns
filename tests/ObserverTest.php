<?php

use Behavioral\Observer\GeneralDisplay;
use Behavioral\Observer\StatisticsDisplay;
use Behavioral\Observer\Weather;
use PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase
{
    private Weather $weather;
    private GeneralDisplay $generalDisplay;
    private StatisticsDisplay $statisticsDisplay;

    protected function setUp(): void
    {
        $this->weather = new Weather();
        $this->generalDisplay = new GeneralDisplay($this->weather);
        $this->statisticsDisplay = new StatisticsDisplay($this->weather);
    }

    public function testAllObserversWillBeNotifiedWhenSetWeatherMeasurements()
    {
        $this->weather->setMeasurements(10, 20, 30);
        self::assertEquals("Current conditions: 10F degrees and 20% humidity", $this->generalDisplay->getState());
        self::assertEquals("Here is our Statistics for today 20 40 30", $this->statisticsDisplay->getState());
    }
}