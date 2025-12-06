<?php

namespace App\Services\Strategies;

use App\Contracts\PaymentStrategy;

class BankTransferStrategy implements PaymentStrategy
{
    public function pay(float $amount): void
    {
        // TODO: Implement bank transfer payment.
    }

    public function getCost(): float
    {
        return 0.01;
    }
}
