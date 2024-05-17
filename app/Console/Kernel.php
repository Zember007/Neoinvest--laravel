<?php

namespace App\Console;

use App\Actions\ApplyIncome;
use App\Actions\ApplyMonthlyTurnoverBonus;
use App\Actions\FlushDailyMetrics;
use App\Actions\FlushMonthlyMetrics;
use App\Actions\RefundClosedPackets;
use App\Actions\TrashExpiredPackets;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(ApplyIncome::class)->daily();
        $schedule->call(TrashExpiredPackets::class)->daily();
        $schedule->call(RefundClosedPackets::class)->daily();
        $schedule->call(ApplyMonthlyTurnoverBonus::class)->monthly();
        $schedule->call(FlushDailyMetrics::class)->daily();
        $schedule->call(FlushMonthlyMetrics::class)->monthly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
