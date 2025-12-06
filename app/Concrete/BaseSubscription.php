<?php

namespace App\Concrete;

use App\Contracts\Subscription;

class BaseSubscription implements Subscription
{
    public function getSubscription(): string
    {
        return 'base subscription';
    }

    public function getCost(): float
    {
        return 0.01;
    }
}
