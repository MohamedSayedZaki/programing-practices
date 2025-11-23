<?php

namespace App\Services\Notifications;

use App\Contracts\NotificationChannel;

class PushNotification implements NotificationChannel
{
    public const NAME = 'push';

    public function send(string $message): void
    {
        // TODO: Implement send() method.
    }

    public function getCost(): float
    {
        return 0.05;
    }
}
