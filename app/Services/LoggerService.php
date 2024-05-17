<?php

namespace App\Services;

use App\Models\User;

class LoggerService
{
    public function log(int $action, User $performer, array $payload = [])
    {
        $performer->logs()->create([
            'action' => $action,
            'ip_address' => ip(),
            'payload' => $payload,
        ]);
    }

    public function logAdmin(int $action, array $payload = [])
    {
        $this->log($action, auth()->user(), array_merge($payload, ['is_admin' => true]));
    }
}