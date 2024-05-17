<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Cache;

class VerifyEmail extends Notification
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
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $code = random_int(1000, 9999);
        Cache::put($notifiable->getVerificationCodeKey(), $code, now()->addMinutes(3));

        $subject = $this->passwordReset
            ? trans('emails.reset.subject')
            : trans('emails.verification.subject');
        $view = $this->passwordReset
            ? 'emails.password-reset'
            : 'emails.email-verification';

        return (new MailMessage)
            ->subject($subject)
            ->view($view, compact('code'));
    }
}
