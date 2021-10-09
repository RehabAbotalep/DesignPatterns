<?php


namespace Structural\Adapter;


class DuckAdapter implements Turkey
{
    private Duck $duck;

    public function __construct(Duck $duck)
    {
        $this->duck = $duck;
    }

    public function gobble()
    {
        return $this->duck->quack();
    }

    public function fly()
    {
        return $this->duck->fly();
    }
}