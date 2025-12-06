<?php

namespace App\Services\Strategies;

use App\Contracts\PaymentStrategy;

class StripeStrategy implements PaymentStrategy
{
    public function pay(float $amount): void
    {
        // TODO: Implement stripe payment.
    }

    public function getCost(): float
    {
        return 0.01;
    }
}
