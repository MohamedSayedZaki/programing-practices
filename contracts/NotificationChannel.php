<?php

namespace App\Contracts;

interface NotificationChannel
{
    const NAME = 'unknown';

    public function send(string $message): void;

    public function getCost(): float;
}
