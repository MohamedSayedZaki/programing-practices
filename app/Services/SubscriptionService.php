<?php

namespace App\Services;

use App\Concrete\BaseSubscription;
use App\Contracts\Subscription;
use App\Decorators\Subscriptions\AdFreeDecorator;
use App\Decorators\Subscriptions\HDStreamingDecorator;
use App\Decorators\Subscriptions\OfflineDownloadsDecorator;

class SubscriptionService implements Subscription
{
    private $subscription;
    
    private const SUBSCRIPTION_TYPES = [
        'ad-free',
        'hd-streaming',
        'offline-downloads',
    ];
    
    public function setSubscription(string $type): void
    {
        $this->subscription = new BaseSubscription();
        // chaining decorators to build a complex subscription object
        // foreach (self::SUBSCRIPTION_TYPES as $type) {
            $this->subscription = $this->selectSubscription($this->subscription, $type);
        // }
    }
    
    public function getSubscription(): string
    {
        return $this->subscription->getSubscription();
    }

    public function getCost(): float
    {
        return $this->subscription->getCost();
    }

    private function selectSubscription(Subscription $subscription, string $type): Subscription
    {
        return match ($type) {
            'ad-free' => new AdFreeDecorator($subscription),
            'hd-streaming' => new HDStreamingDecorator($subscription),
            'offline-downloads' => new OfflineDownloadsDecorator($subscription),
            default => throw new \Exception('Invalid subscription type'),
        };
    }
}
