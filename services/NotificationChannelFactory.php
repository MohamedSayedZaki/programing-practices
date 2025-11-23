<?php

namespace App\Services;

use App\Contracts\NotificationChannel;
use App\Services\Notifications\EmailNotification;
use App\Services\Notifications\PushNotification;
use App\Services\Notifications\SlackNotification;

class NotificationChannelFactory
{
    public static function create(string $channel): NotificationChannel
    {
        return match ($channel) {
            'email' => new EmailNotification,
            'sms' => new PushNotification,
            'slack' => new SlackNotification,
            default => throw new \Exception('Unsupported channel'),
        };
    }
}
