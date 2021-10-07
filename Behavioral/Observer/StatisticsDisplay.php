<?php


namespace Behavioral\Observer;


class StatisticsDisplay implements Observer, Display
{
    private float $temp;
    private float $humidity;
    private float $pressure;
    private Weather $weather;
    private string $state;

    public function __construct(Weather $weather)
    {
        $this->weather = $weather;
        $this->weather->register($this);
    }

    public function update(float $temp, float $humidity, float $pressure)
    {   /** These values only just for test */
        $this->temp = $temp * 2;
        $this->humidity = $humidity * 2;
        $this->pressure = $pressure;
        $this->display();
    }

    public function display()
    {
        $this->state = "Here is our Statistics for today " . $this->temp . " ".$this->humidity
            ." " .$this->pressure;
    }

    public function getState(): string
    {
        return $this->state;
    }
}