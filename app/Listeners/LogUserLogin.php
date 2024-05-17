<?php

namespace App\Listeners;

use App\Models\Log;
use App\Services\LoggerService;
use Illuminate\Auth\Events\Login;

class LogUserLogin
{
    private LoggerService $loggerService;

    public function __construct(LoggerService $loggerService)
    {
        $this->loggerService = $loggerService;
    }

    public function handle(Login $event)
    {
        $this->loggerService->log(Log::LOGIN, $event->user);
    }
}
