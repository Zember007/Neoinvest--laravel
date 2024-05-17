<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Collection;

class UserRegisteredDuplicate extends Notification
{
    use Queueable;

    private User $user;
    private Collection $duplicates;

    public function __construct(User $user, Collection $duplicates)
    {
        $this->user = $user;
        $this->duplicates = $duplicates;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(trans('emails.duplicate.subject'));
    }
}
