<?php

namespace App\Console;

use App\Jobs\ClubDataJob;
use App\Jobs\GetMatchJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->job(new ClubDataJob)->dailyAt('2:00');
        $schedule->job(new GetMatchJob)->dailyAt('2:00');
        $schedule->command('queue:restart')->everyFiveMinutes();
        $schedule->command('queue:work')->everyFiveMinutes();

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
