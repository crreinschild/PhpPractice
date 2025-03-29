<?php

namespace App\Models;

class WeatherReport
{
    public $location;
    public $temperature;
    public $humidity;
    public $windSpeed;
    public $weatherStatus;

    public function __construct($location, $temperature, $humidity, $windSpeed, $weatherStatus)
    {
        $this->location = $location;
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->windSpeed = $windSpeed;
        $this->weatherStatus = $weatherStatus;
    }
}
