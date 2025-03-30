<?php

namespace App\Providers;

use App\Services\WeatherService;
use Illuminate\Support\ServiceProvider;

/**
 * WeatherServiceProvider
 *
 * Adds the WeatherService to the service container.
 *
 * @package App\Providers
 */
class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the WeatherService.
     * I supposed it doesn't need to be a singleton.
     */
    public function register()
    {
        $this->app->singleton('weather', function ($app) {
            return new WeatherService(); // Example temperature
        });
    }
}
