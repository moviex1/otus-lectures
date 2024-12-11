<?php

namespace App\Models;

use App\Events\UpdatedMovie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\MovieFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
    ];

    protected static function booted()
    {
        static::deleting(function (Movie $movie) {
            if (Cache::has('movie-'. $movie->id)) {
                Cache::delete('movie-'. $movie->id);
            }
        });
    }

    protected $dispatchesEvents = [
        'updated' => UpdatedMovie::class,
    ];
}



