<?php

use App\Jobs\CalculateDailyOrders;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::job(new CalculateDailyOrders())->everyMinute()->onOneServer();
//Schedule::job(new CalculateDailyOrders())->everyMinute()->evenInMaintenanceMode();
Schedule::exec('./test.sh')->everyMinute();
//Schedule::exec('./output.sh')->everyMinute()->appendOutputTo('./file.txt');
//Schedule::exec('./output.sh')->fridays()
//    ->at('18:00')
//    ->timezone('Russia/Moscow')
//    ->appendOutputTo('./file.txt');

