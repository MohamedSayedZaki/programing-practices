<?php

namespace App\Services\Formatters;

use App\Contracts\NotificationFormatter;

class TextFormatter implements NotificationFormatter
{
    public function format(string $message): string
    {
        return strip_tags($message);
    }
}
