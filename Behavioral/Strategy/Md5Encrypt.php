<?php


namespace Behavioral\Strategy;


class Md5Encrypt implements StrategyInterface
{

    const TYPE = "Md5";

    public function Encrypt(string $data): array
    {
        return [md5($data), self::TYPE];
    }
}