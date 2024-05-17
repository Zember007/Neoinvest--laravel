<?php

namespace App\Listeners;

use App\Models\Log;
use App\Services\LoggerService;
use Illuminate\Auth\Events\Registered;

class LogUserRegistration
{
    private LoggerService $loggerService;

    public function __construct(LoggerService $loggerService)
    {
        $this->loggerService = $loggerService;
    }

    public function handle(Registered $event)
    {
        $this->loggerService->log(Log::REGISTER, $event->user);
    }
}
