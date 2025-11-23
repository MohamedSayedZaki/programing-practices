<?php

namespace App\Contracts;

interface NotificationFormatter
{
    public function format(string $message): string;
}
