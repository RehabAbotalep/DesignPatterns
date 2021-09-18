<?php

use Behavioral\Command\GarageDoor;
use Behavioral\Command\GarageDoorOpenCommand;
use Behavioral\Command\Light;
use Behavioral\Command\LightOnCommand;
use Behavioral\Command\SimpleRemoteControl;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';

class SimpleCommandTest extends TestCase
{
    private SimpleRemoteControl $remote;

    protected function setUp(): void
    {
        $this->remote = new SimpleRemoteControl();
        $light = new Light();
        $lightOn = new LightOnCommand($light);
        $this->remote->setCommand($lightOn);
    }

    public function testCanTurnOnLight()
    {
       self::assertEquals("Light is on ", $this->remote->buttonWasPressed());
    }

    public function testCanOpenGarageDoor()
    {
        $garageDoor = new GarageDoor();
        $openGarage = new GarageDoorOpenCommand($garageDoor);
        $this->remote->setCommand($openGarage);
        self::assertEquals("Garage door is opened ", $this->remote->buttonWasPressed());
    }
}