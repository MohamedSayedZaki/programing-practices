<?php

namespace App\Services\Strategies;

use App\Contracts\PaymentStrategy;

class CryptoStrategy implements PaymentStrategy
{
    public function pay(float $amount): void
    {
        // TODO: Implement crypto payment.
    }

    public function getCost(): float
    {
        return 0.01;
    }
}
