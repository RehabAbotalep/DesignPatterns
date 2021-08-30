<?php


namespace Behavioral\Observer;


class Weather implements Subject
{
    private array $observers;
    private float $temp;
    private float $humidity;
    private float $pressure;

    public function register(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function remove(Observer $observer)
    {
        if(($key = array_search($observer, $this->observers, true))!=false)
            unset($this->observers[$key]);
    }

    public function notify()
    {
        /* @var Observer $observer
        */
        foreach ($this->observers as $observer)
            $observer->update($this->temp, $this->humidity, $this->pressure);
    }

    public function measurementsChanged()
    {
        return $this->notify();
    }

    public function setMeasurements(float $temp, float $humidity, float $pressure)
    {
        $this->temp = $temp;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->measurementsChanged();
    }
}