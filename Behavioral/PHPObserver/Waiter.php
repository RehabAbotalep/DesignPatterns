<?php
namespace Behavioral\PHPObserver;

use SplObserver;
use SplSubject;

class Waiter implements SplObserver
{

    private string $state;

    public function update(SplSubject $subject)
    {
        /** @var Resturant $subject*/
        $this->state = sprintf( "Waiter is ready for order number %s",$subject->getOrderNo());
    }

    public function getState(): string
    {
        return $this->state;
    }
}