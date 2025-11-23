<?php

namespace App\Services;

use App\Contracts\NotificationChannel;
use App\Contracts\NotificationFormatter;
use Auth;

class NotificationService
{
    private string $content;

    public function __construct(private readonly BillingService $billingService) {}

    public function setContent(string $content)
    {
        $this->content = $content;
    }

    public function sendNotification(NotificationChannel $notificationChannel, NotificationFormatter $notificationFormatter): void
    {
        $user = Auth::user();

        $formattedContent = $notificationFormatter->format($this->content);

        $notificationChannel->send($formattedContent);

        $cost = $notificationChannel->getCost();

        $this->billingService->createBill(
            $user,
            'Notification sent via '.$notificationChannel::NAME,
            $cost
        );
    }
}
