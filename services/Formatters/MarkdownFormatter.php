<?php

namespace App\Services\Formatters;

use App\Contracts\NotificationFormatter;

class MarkdownFormatter implements NotificationFormatter
{
    public function format(string $message): string
    {
        return $message;
    }
}
