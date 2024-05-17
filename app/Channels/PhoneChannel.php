<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PhoneChannel
{
    private $notifiable;

    public function send($notifiable, Notification $notification)
    {
        $this->notifiable = $notifiable;

        if ($notification->resend) {
            $this->repeatCall();
        } else {
            $this->initCall();
        }
    }

    private function repeatCall()
    {
        $uCallerId = Cache::get($this->getUCallerIdKey());
        if (is_null($uCallerId)) {
            $this->initCall();
            return;
        }

        $response = Http::get(config('services.ucaller.repeat_endpoint'), [
            'service_id' => config('services.ucaller.service_id'),
            'key' => config('services.ucaller.secret'),
            'uid' => $uCallerId,
        ]);

        if ($response->json('status') == false) {
            $this->initCall();
        }
    }

    private function getUCallerIdKey(): string
    {
        return "user:{$this->notifiable->id}:ucaller_id";
    }

    private function initCall()
    {
        $response = Http::get(config('services.ucaller.init_endpoint'), [
            'service_id' => config('services.ucaller.service_id'),
            'key' => config('services.ucaller.secret'),
            'phone' => Str::replace(['(', ')', '+', ' ', '-'], '', $this->notifiable->phone),
        ]);
        if ($response->json('status') == true) {
            Cache::put($this->getUCallerIdKey(), $response->json('ucaller_id'), now()->addMinutes(3));
            Cache::put($this->notifiable->getVerificationCodeKey(), $response->json('code'), now()->addMinutes(3));
        }
    }
}