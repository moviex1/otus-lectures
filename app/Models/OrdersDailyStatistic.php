<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersDailyStatistic extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'date',
        'total_sum',
    ];
}
