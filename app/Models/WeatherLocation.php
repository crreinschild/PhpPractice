<?php

namespace App\Models;

class WeatherLocation
{
    public $id;
    public $city;
    public $country;
    public $latitude;
    public $longitude;

    public function __construct($id, $city, $country, $latitude, $longitude)
    {
        $this->id = $id;
        $this->city = $city;
        $this->country = $country;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
}
