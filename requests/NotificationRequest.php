<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'channel' => 'required|in:email,sms,slack',
            'message_type' => 'required|in:text,html,markdown',
            'content' => 'required|string',
        ];
    }
}
