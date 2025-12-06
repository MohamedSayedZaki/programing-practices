<?php

namespace App\Decorators\Subscriptions;

use App\Contracts\Subscription;

final class OfflineDownloadsDecorator implements Subscription
{
    public function __construct(private Subscription $subscription) {}

    public function getSubscription(): string
    {
        return $this->subscription->getSubscription() . ' with offline downloads';
    }

    public function getCost(): float
    {
        return $this->subscription->getCost() + 0.01;
    }
}
