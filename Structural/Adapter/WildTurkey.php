<?php
namespace Structural\Adapter;

class WildTurkey implements Turkey
{

    public function gobble(): string
    {
        return "Gobble gobble";
    }

    public function fly(): string
    {
        return "I’m flying a short distance";
    }
}