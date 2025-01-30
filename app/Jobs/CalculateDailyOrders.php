<?php

namespace App\Jobs;

use App\Models\Order;
use App\Models\OrdersDailyStatistic;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CalculateDailyOrders implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {}

    public function handle(): void
    {
        $start = today()->startOfDay();
        $end = today()->endOfDay();

        $sum = Order::query()
            ->whereBetween('created_at', [$start, $end])
            ->sum('total_price');

        OrdersDailyStatistic::query()->create([
            'date' => today(),
            'total_sum' => $sum,
        ]);
    }
}
