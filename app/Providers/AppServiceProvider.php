<?php

namespace App\Providers;

use App\Contracts\ApiInstagramInterface;
use App\Contracts\CalculateInterface;
use App\Facades\Calc;
use App\Services\CalculateService;
use App\Services\Instagram\FirstInstagramApi;
use App\Services\Instagram\SecondInstagramApi;
use App\Services\TestService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {






//        $this->app->bind(ApiInstagramInterface::class, FirstInstagramApi::class);
        $this->app->bind(ApiInstagramInterface::class, SecondInstagramApi::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
