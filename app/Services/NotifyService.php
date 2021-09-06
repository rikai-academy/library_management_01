<?php
namespace App\Services;

use App\Models\Notification;

class NotifyService
{
    public function create_notify($user_id)
    {
        $notify_save = Notification::create([
            'user_id' => $user_id,
            'status'=> 0,
            'title' => __('message.notify_mess'),
        ]);
    }
}
