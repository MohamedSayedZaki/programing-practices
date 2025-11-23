<?php

namespace App\Services\Formatters;

use App\Contracts\NotificationFormatter;

class HtmlFormatter implements NotificationFormatter
{
    public function format(string $message): string
    {
        return $message;
    }
}
