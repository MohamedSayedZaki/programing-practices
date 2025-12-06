<?php

namespace App\Contracts;

interface Subscription
{
    public function getSubscription(): string;

    public function getCost(): float;
}
