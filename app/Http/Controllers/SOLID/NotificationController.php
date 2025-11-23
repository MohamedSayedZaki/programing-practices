<?php

namespace App\Http\Controllers\SOLID;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Services\NotificationChannelFactory;
use App\Services\NotificationFormatterFactory;
use App\Services\NotificationService;
use Illuminate\Http\JsonResponse;

/**
 * Fixing NotificationController to follow the SOLID principles
 * By applying the first principle of SOLID, Single Responsibility Principle (SRP)
 * to delegate the responsibility of sending notifications to the NotificationService.
 */
class NotificationController extends Controller
{
    public function __construct(private NotificationService $notificationService) {}

    /**
     * Send a notification to a user
     */
    public function sendNotification(NotificationRequest $request): JsonResponse
    {
        // Create the notification channel and formatter
        $notificationChannel = NotificationChannelFactory::create($request->input('channel'));
        $notificationFormatter = NotificationFormatterFactory::create($request->input('message_type'));

        // Set the notification content
        $this->notificationService->setContent($request->input('content'));

        // Send the notification
        $this->notificationService->sendNotification(
            $notificationChannel,
            $notificationFormatter
        );

        return response()->json([
            'message' => 'Notification sent successfully',
        ]);
    }
}
