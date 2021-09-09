<?php


namespace Behavioral\Observer;


class GeneralDisplay implements Observer, Display
{
    private float $temp;
    private float $humidity;
    private float $pressure;
    private Weather $weather;
    private string $state;

    public function __construct(Subject $weather)
    {
        $this->weather = $weather;
        $this->weather->register($this);
    }

    public function update(float $temp, float $humidity, float $pressure)
    {
        $this->temp = $temp;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->display();
    }

    public function display()
    {
        $this->state = "Current conditions: " . $this->temp
            . "F degrees and " .$this->humidity . "% humidity";
    }
    public function getState(): string
    {
        return $this->state;
    }
}