<?php

namespace App\Services\Notifications;

use App\Contracts\NotificationChannel;

class EmailNotification implements NotificationChannel
{
    public const NAME = 'email';

    public function send(string $message): void
    {
        // TODO: Implement send() method.
    }

    public function getCost(): float
    {
        return 0.01;
    }
}
