<?php

namespace App\Contracts;

interface PaymentStrategy
{
    public function pay(float $amount): void;

    public function getCost(): float;
}
