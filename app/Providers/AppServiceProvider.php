<?php

namespace App\Providers;

use App\Interfaces\WeatherInterface;
use App\Services\Weaher\Openweathermap;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(WeatherInterface::class, Openweathermap::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
