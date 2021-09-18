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
    private GarageDoorOpenCommand $garageDoorOpen;
    private GarageDoorCloseCommand $garageDoorClose;
    private LightOnCommand $lightOn;
    private LightOffCommand $lightOff;

    protected function setUp(): void
    {
        $this->remote = new RemoteControl();
        $garageDoor = new GarageDoor();
        $this->garageDoorOpen = new GarageDoorOpenCommand($garageDoor);
        $this->garageDoorClose = new GarageDoorCloseCommand($garageDoor);

        $light = new Light();
        $this->lightOn = new LightOnCommand($light);
        $this->lightOff = new LightOffCommand($light);
    }

    public function testCanSetOnAndOffLightCommandsOnTheFirstSlot()
    {
        $this->remote->setCommand(0, $this->lightOn, $this->lightOff);
        self::assertEquals("Light is on ", $this->remote->onButtonWasPushed(0));
        self::assertEquals("Light is off ", $this->remote->offButtonWasPushed(0));

    }

    public function testCanSetOnAndOffGarageDoorCommandsOnTheSecondSlot()
    {
        $this->remote->setCommand(1, $this->garageDoorOpen, $this->garageDoorClose);
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
        $this->remote->setCommand(0, $this->lightOn, $this->lightOff);

        self::assertEquals("Light is on ", $this->remote->onButtonWasPushed(0));
        self::assertEquals("Light is off ", $this->remote->undoButtonWasPushed());
    }

    public function testCanUndoOffLightCommand()
    {
        $this->remote->setCommand(0, $this->lightOn, $this->lightOff);

        self::assertEquals("Light is off ", $this->remote->offButtonWasPushed(0));
        self::assertEquals("Light is on ", $this->remote->undoButtonWasPushed());
    }

    public function testMacroCommand()
    {
        $partyOn = [$this->garageDoorOpen, $this->lightOn];
        $partyOff = [$this->garageDoorClose, $this->lightOff];

        $partyOnMacro = new MacroCommand($partyOn);
        $partyOffMacro = new MacroCommand($partyOff);

        $this->remote->setCommand(0, $partyOnMacro, $partyOffMacro);
        
        self::assertEquals("Garage door is opened Light is on ", $this->remote->onButtonWasPushed(0));
        self::assertEquals("Garage door is closed Light is off ", $this->remote->offButtonWasPushed(0));
    }

}
