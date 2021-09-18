<?php
namespace Behavioral\Command;

interface Command
{
    public function execute();
    public function undo();
}