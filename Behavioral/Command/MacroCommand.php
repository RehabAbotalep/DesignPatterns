<?php


namespace Behavioral\Command;


class MacroCommand implements Command
{
    public $commands;

    public function __construct(array $commands)
    {
        $this->commands = $commands;
    }

    public function execute()
    {
        $output = '';
        for($i=0; $i<count($this->commands); $i++)
        {
            $output = $output . $this->commands[$i]->execute();
        }
        return $output;
    }

    public function undo()
    {
        $output = '';
        for($i=0; $i<count($this->commands); $i++)
        {
            $output = $output . $this->commands[$i]->undo();
        }
        return $output;
    }
}