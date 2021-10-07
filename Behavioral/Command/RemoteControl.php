<?php


namespace Behavioral\Command;



class RemoteControl
{
    public array $onCommands;
    private array $offCommands;
    private Command $undoCommand;

    public function __construct()
    {
        $noCommand = new NoCommand();
        $this->onCommands = [7];
        $this->offCommands = [7];
        for ($i = 0; $i<7; $i++)
        {
            $this->onCommands[$i] = $noCommand;
            $this->offCommands[$i] = $noCommand;
        }
        $this->undoCommand = $noCommand;
    }

    public function setCommand($slot, $onCommand, $offCommand)
    {
        $this->onCommands[$slot] = $onCommand;
        $this->offCommands[$slot] = $offCommand;
    }

    public function onButtonWasPushed($slot)
    {
        $this->undoCommand = $this->onCommands[$slot];
        return $this->onCommands[$slot]->execute();
    }

    public function offButtonWasPushed($slot)
    {
        $this->undoCommand = $this->offCommands[$slot];
        return $this->offCommands[$slot]->execute();
    }

    public function undoButtonWasPushed()
    {
        return $this->undoCommand->undo();
    }
}