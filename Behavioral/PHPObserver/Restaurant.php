<?php
namespace Behavioral\PHPObserver;

use SplObjectStorage;
use SplObserver;
use SplSubject;

class Restaurant implements SplSubject
{
    private SplObjectStorage $observers;
    private int $orderNo = 0;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {   /** @var SplObserver $observer*/
        foreach ($this->observers as $observer)
        {
            $observer->update($this);
        }
    }

    public function addNewOrder()
    {
        $this->orderNo +=1;
        $this->notify();
    }
    public function getOrderNo(): int
    {
        return $this->orderNo;
    }


}