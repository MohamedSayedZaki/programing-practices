<?php

namespace App\Services;

use App\Contracts\PaymentStrategy;

class PaymentService
{
    private PaymentStrategy $paymentStrategy;

    public function setStrategy(PaymentStrategy $paymentStrategy): void
    {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function pay(float $amount): void
    {
        $this->paymentStrategy->pay($amount);
    }
}
