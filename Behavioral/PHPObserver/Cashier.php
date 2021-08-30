<?php
namespace Behavioral\PHPObserver;

use SplObserver;
use SplSubject;

class Cashier implements SplObserver
{
    private string $state;

    public function update(SplSubject $subject)
    {
        /** @var Restaurant $subject*/
        $this->state = sprintf( "Cashier is ready for order number %s",$subject->getOrderNo());
    }

    public function getState(): string
    {
        return $this->state;
    }
}