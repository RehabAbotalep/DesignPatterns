<?php


namespace Behavioral\Command;


class SimpleRemoteControl
{
    public Command $slot;

    public function setCommand(Command $command)
    {
        $this->slot = $command;
    }

    public function buttonWasPressed()
    {
        return $this->slot->execute();
    }

}