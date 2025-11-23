# SOLID Principles - Refactoring Example

## Bloated NotificationController

This is the bloated class which will be refactored to apply SOLID principles.

### Issues with Current Implementation

- **SRP Violation**: Handles content rendering, notification sending, and billing logging
- **OCP Violation**: Must modify the class to add new message types or channels
- **DIP Violation**: Directly depends on concrete implementations

```php
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function sendNotification(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $channel = $request->input('channel'); // 'email', 'sms', 'slack'
        $messageType = $request->input('message_type'); // 'text', 'html', 'markdown'
        $content = $request->input('content');

        // --- Content Rendering (Violates OCP) ---
        if ($messageType == 'text') {
            $formattedContent = strip_tags($content);
        } elseif ($messageType == 'html') {
            $formattedContent = $content; // Assume it's already HTML
        } elseif ($messageType == 'markdown') {
            // ... a bunch of markdown-to-html logic ...
            $formattedContent = $this->parseMarkdown($content);
        } else {
            throw new \Exception("Unsupported message type");
        }

        // --- Notification Sending (Violates OCP & SRP) ---
        if ($channel == 'email') {
            Mail::to($user->email)->send(new GenericMail($formattedContent));
            $cost = 0.01;
        } elseif ($channel == 'sms') {
            // ... complex SMS provider API call ...
            $this->sendSms($user->phone, $formattedContent);
            $cost = 0.05;
        } elseif ($channel == 'slack') {
            // ... Slack Webhook logic ...
            $this->sendToSlack($user->slack_id, $formattedContent);
            $cost = 0.001;
        } else {
            throw new \Exception("Unsupported channel");
        }

        // --- Billing Log (Violates SRP & DIP) ---
        $billingLog = new \App\Models\BillingLog();
        $billingLog->user_id = $user->id;
        $billingLog->amount = $cost;
        $billingLog->description = "Notification sent via $channel";
        $billingLog->save();

        return response()->json(['message' => 'Notification sent!']);
    }

    // ... private helper methods sendSms(), sendToSlack(), parseMarkdown() ...
}
```