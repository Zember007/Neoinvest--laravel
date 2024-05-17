<?php

namespace App\Actions;

use Illuminate\Support\Facades\Cache;

class FlushDailyMetrics
{
    public function __invoke()
    {
        Cache::tags('daily')->flush();
    }
}