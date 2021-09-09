<?php
require_once __DIR__ . '/../vendor/autoload.php';


use Behavioral\PHPObserver\Cashier;
use Behavioral\PHPObserver\Kitchen;
use Behavioral\PHPObserver\Restaurant;
use Behavioral\PHPObserver\Waiter;
use PHPUnit\Framework\TestCase;

class PHPObserverTest extends TestCase
{
    private Restaurant $restaurant;
    private Cashier $cashier;
    private Waiter $waiter;
    private Kitchen $kitchen;

    protected function setUp(): void
    {
        $this->restaurant = new Restaurant();
        $this->cashier = new Cashier();
        $this->waiter = new Waiter();
        $this->kitchen = new Kitchen();

        $this->restaurant->attach($this->cashier);
        $this->restaurant->attach($this->waiter);
        $this->restaurant->attach($this->kitchen);
    }

    public function testAllObserversWillBeNotifiedWhenNewOrderIsComing()
    {
        $this->restaurant->addNewOrder();
        self::assertEquals("Cashier is ready for order number 1", $this->cashier->getState());
        self::assertEquals("Waiter is ready for order number 1", $this->waiter->getState());
        self::assertEquals("Kitchen is ready for order number 1", $this->kitchen->getState());
    }

    public function testAllObserversWillBeNotifiedWhenTwoNewOrdersAreComing()
    {
        $this->restaurant->addNewOrder();
        $this->restaurant->addNewOrder();
        self::assertEquals("Cashier is ready for order number 2", $this->cashier->getState());
        self::assertEquals("Waiter is ready for order number 2", $this->waiter->getState());
        self::assertEquals("Kitchen is ready for order number 2", $this->kitchen->getState());
    }
}