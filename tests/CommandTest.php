<?php

use Behavioral\Command\GarageDoor;
use Behavioral\Command\GarageDoorCloseCommand;
use Behavioral\Command\GarageDoorOpenCommand;
use Behavioral\Command\Light;
use Behavioral\Command\LightOffCommand;
use Behavioral\Command\LightOnCommand;
use Behavioral\Command\MacroCommand;
use Behavioral\Command\RemoteControl;
use Behavioral\Command\Stereo;
use Behavioral\Command\StereoOffCommand;
use Behavioral\Command\StereoOnWithCDCommand;
use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    private RemoteControl $remote;
    private GarageDoorOpenCommand $garageDoorOpenCommand;
    private GarageDoorCloseCommand $garageDoorCloseCommand;
    private LightOnCommand $lightOnCommand;
    private LightOffCommand $lightOffCommand;

    protected function setUp(): void
    {
        $this->remote = new RemoteControl();
        $garageDoor = new GarageDoor();
        $this->garageDoorOpenCommand = new GarageDoorOpenCommand($garageDoor);
        $this->garageDoorCloseCommand = new GarageDoorCloseCommand($garageDoor);

        $light = new Light();
        $this->lightOnCommand = new LightOnCommand($light);
        $this->lightOffCommand = new LightOffCommand($light);
    }

    public function testCanSetOnAndOffLightCommandsOnTheFirstSlot()
    {
        $this->remote->setCommand(0, $this->lightOnCommand, $this->lightOffCommand);
        self::assertEquals("Light is on ", $this->remote->onButtonWasPushed(0));
        self::assertEquals("Light is off ", $this->remote->offButtonWasPushed(0));

    }

    public function testCanSetOnAndOffGarageDoorCommandsOnTheSecondSlot()
    {
        $this->remote->setCommand(1, $this->garageDoorOpenCommand, $this->garageDoorCloseCommand);
        self::assertEquals("Garage door is opened ", $this->remote->onButtonWasPushed(1));
        self::assertEquals("Garage door is closed ", $this->remote->offButtonWasPushed(1));
    }

    public function testCanSetOnAndOffStereoCommandsOnTheThirdSlot()
    {
        $stereo = new Stereo();
        $stereoOn = new StereoOnWithCDCommand($stereo);
        $stereoOff = new StereoOffCommand($stereo);

        $this->remote->setCommand(2, $stereoOn, $stereoOff);
        self::assertEquals("Stereo is on, Cd is set, Volume is set to 11",
            $this->remote->onButtonWasPushed(2));
        self::assertEquals("Stereo is off", $this->remote->offButtonWasPushed(2));
    }

    public function testCanUndoOnLightCommand()
    {
        $this->remote->setCommand(0, $this->lightOnCommand, $this->lightOffCommand);

        self::assertEquals("Light is on ", $this->remote->onButtonWasPushed(0));
        self::assertEquals("Light is off ", $this->remote->undoButtonWasPushed());
    }

    public function testCanUndoOffLightCommand()
    {
        $this->remote->setCommand(0, $this->lightOnCommand, $this->lightOffCommand);

        self::assertEquals("Light is off ", $this->remote->offButtonWasPushed(0));
        self::assertEquals("Light is on ", $this->remote->undoButtonWasPushed());
    }

    public function testMacroCommand()
    {
        $partyOn = [$this->garageDoorOpenCommand, $this->lightOnCommand];
        $partyOff = [$this->garageDoorCloseCommand, $this->lightOffCommand];

        $partyOnMacro = new MacroCommand($partyOn);
        $partyOffMacro = new MacroCommand($partyOff);

        $this->remote->setCommand(0, $partyOnMacro, $partyOffMacro);
        
        self::assertEquals("Garage door is opened Light is on ", $this->remote->onButtonWasPushed(0));
        self::assertEquals("Garage door is closed Light is off ", $this->remote->offButtonWasPushed(0));
    }

}
