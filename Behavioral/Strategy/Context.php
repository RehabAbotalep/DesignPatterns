<?php


namespace Behavioral\Strategy;


class Context
{
    private Encryptor $encryptor;

    public function __construct(Encryptor $encryptor)
    {
        $this->encryptor = $encryptor;
    }

    public function setStrategy(Encryptor $encryptor)
    {
        $this->encryptor = $encryptor;
    }

    public function encrypt($data): array
    {
        return $this->encryptor->Encrypt($data);
    }
}