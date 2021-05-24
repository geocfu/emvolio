<?php

namespace App\Console;

use App\Console\Commands\GetVaccineData;
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
        $schedule->command(GetVaccineData::class)->dailyAt('18:05')->withoutOverlapping(); // UTC
        $schedule->command(GetVaccineData::class)->dailyAt('18:10')->withoutOverlapping(); // UTC
        $schedule->command(GetVaccineData::class)->dailyAt('18:20')->withoutOverlapping(); // UTC
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
