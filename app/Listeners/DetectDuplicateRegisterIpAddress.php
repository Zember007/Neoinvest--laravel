<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\UserRegisteredDuplicate;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class DetectDuplicateRegisterIpAddress implements ShouldQueue
{
    public function handle(Registered $event)
    {
        $duplicates = User::query()
            ->where('id', '!=', $event->user->id)
            ->where('register_ip_address', $event->user->register_ip_address)
            ->get();

        if ($duplicates->isNotEmpty()) {
            Notification::route('mail', 'alert@neo-invest.club')
                ->notify(new UserRegisteredDuplicate($event->user, $duplicates));
        }
    }
}
