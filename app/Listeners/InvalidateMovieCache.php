<?php

namespace App\Listeners;

use App\Events\UpdatedMovie;
use Illuminate\Support\Facades\Cache;

class InvalidateMovieCache
{
    public function __construct()
    {
    }

    public function handle(UpdatedMovie $event): void
    {
        if (Cache::has('movie-'. $event->movie->id)) {
            Cache::delete('movie-'. $event->movie->id);
        }
    }
}
