<?php

namespace App\Notifications;

use App\Channels\PhoneChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class VerifyPhone extends Notification
{
    use Queueable;

    public bool $resend;
    public bool $passwordReset;

    public function __construct(bool $resend, bool $passwordReset)
    {
        $this->resend = $resend;
        $this->passwordReset = $passwordReset;
    }

    public function via($notifiable): array
    {
        return [PhoneChannel::class];
    }
}
