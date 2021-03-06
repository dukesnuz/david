<?php

namespace David\Console;

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
        //below uncomment to run a cron in the kernel
        //$schedule->command('inspire')->everyTenMinutes(); //daily();
        //https://laravel.com/docs/5.8/scheduling#schedule-frequency-options
        $schedule->command('sitemap:generate')->daily(); //everyTenMinutes();
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
