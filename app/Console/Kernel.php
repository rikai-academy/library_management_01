<?php

namespace App\Console;

use App\Console\Commands\SendBorrowExpiryEmail;
use App\Enums\Status;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SendBorrowExpiryEmail::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('word:day')->daily();
        $schedule->call(function () {
            DB::table('borrowed_books')->where([['status', '=', Status::Approved],['datetime_borrow', '=', Carbon::now()->subMonthsNoOverflow()->endOfMonth()->subMinutes(1)->toDateTimeString()]])->delete();
        })->lastDayOfMonth('23:59');
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
