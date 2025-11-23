<?php

namespace App\Services;

use App\Contracts\NotificationFormatter;
use App\Services\Formatters\HtmlFormatter;
use App\Services\Formatters\MarkdownFormatter;
use App\Services\Formatters\TextFormatter;

class NotificationFormatterFactory
{
    public static function create(string $messageType): NotificationFormatter
    {
        return match ($messageType) {
            'text' => new TextFormatter,
            'html' => new HtmlFormatter,
            'markdown' => new MarkdownFormatter,
            default => throw new \Exception('Unsupported message type'),
        };
    }
}
