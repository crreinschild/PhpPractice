<?php

namespace App\Models;

/**
 * WeatherLocation Model
 *
 * Represents a location with its details such as city, country, latitude, and longitude.
 *
 * TODO: Expand this model to include more details about the location to assist the user in narrowing down the exact
 *   location.
 *
 * @package App\Models
 */
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
