<?php
namespace Behavioral\Strategy;

interface StrategyInterface
{
    public function Encrypt(string $data): array;
}