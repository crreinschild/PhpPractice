<?php

class WeatherServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('weather', function ($app) {
            return new Weather(); // Example temperature
        });
    }
}
