<?php

namespace App\Actions;

use Illuminate\Support\Facades\Cache;

class FlushMonthlyMetrics
{
    public function __invoke()
    {
        Cache::tags('monthly')->flush();
    }
}