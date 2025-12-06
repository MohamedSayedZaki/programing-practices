<?php

namespace App\Http\Controllers\Patterns;

use App\Http\Controllers\Controller;
use App\Services\SubscriptionService;

class SubscriptionController extends Controller
{
    public function __construct(private SubscriptionService $subscriptionService) {}

    public function getSubscription($type)
    {
        $this->subscriptionService->setSubscription($type);
        return $this->subscriptionService->getSubscription();
    }
}