<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;

class SendVerificationNotification
{
    public function handle(Registered $event)
    {
        if (! $event->user->isVerified()) {
            $event->user->sendVerificationNotification();
        }
    }
}
