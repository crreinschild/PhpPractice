<?php

namespace App\Providers;

use App\Services\WeatherService;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('weather', function ($app) {
            return new WeatherService(); // Example temperature
        });
    }
}
