<?php
namespace Behavioral\Strategy;


interface Encryptor
{
    public function Encrypt(string $data): array;
}