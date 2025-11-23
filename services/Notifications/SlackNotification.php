<?php

namespace App\Services\Notifications;

use App\Contracts\NotificationChannel;

class SlackNotification implements NotificationChannel
{
    public const NAME = 'slack';

    public function send(string $message): void
    {
        // TODO: Implement send() method.
    }

    public function getCost(): float
    {
        return 0.02;
    }
}
