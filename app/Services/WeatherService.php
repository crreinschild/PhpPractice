<?php

namespace App\Services;

use App\Models\WeatherReport;
use App\Models\WeatherLocation;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * WeatherService
 *
 * Handles fetching weather and location data from an external API.
 * TODO: Consider making this a facade to facilitate testing of other components.
 *
 * @package App\Services
 */
class WeatherService
{
    // TODO: Make configurable
    public $url = "https://api.open-meteo.com/v1/forecast";

    // TODO: Make a constant; Is there a better way to provide this mapping?
    //  Should I move this to an open-meteo specific class? I should have thought to look for a meteo library.
    public $weatherCodes = [
        0 => 'Clear sky',
        1 => 'Mainly clear', 2 => 'partly cloudy', 3 => 'overcast',
        45 => 'Fog', 48 => 'depositing rime fog',
        51 => 'Light Drizzle', 53 => 'Moderate Drizzle', 55 => 'Dense Drizzle',
        56 => 'Light Freezing Drizzle', 57 => 'Dense Freezing Drizzle',
        61 => 'Slight Rain', 63 => 'Moderate Rain', 65 => 'Heavy Rain',
        66 => 'Light Freezing Rain', 67 => 'Heavy Freezing Rain',
        71 => 'Slight Snow', 73 => 'Moderate Snow', 75 => 'Heavy Snow',
        77 => 'Snow grains',
        80 => 'Slight Rain Showers', 81 => 'Moderate Rain Showers', 82 => 'Violent Rain Showers',
        85 => 'Slight Snow Showers', 86	=> 'Heavy Snow Showers',
        95 => 'Thunderstorms',
        96 => 'Thunderstorms with slight hail', 99 => 'Thunderstorms with heavy hail'];

    /**
     * Get the weather for the given location.
     *
     * @param WeatherLocation $location The location to get the weather for. Note: requires latitude and longitude.
     * @return WeatherReport The weather report for the location.
     */
    public function getWeather(WeatherLocation $location) : WeatherReport
    {
        error_log(json_encode($location));
        // TODO: Put this meteo-specific API call into it's own class, and use a facade or DI
        $response = Http::get($this->url, [
            'latitude' => $location->latitude,
            'longitude' => $location->longitude,
            "current" => ["temperature_2m", "relative_humidity_2m", "wind_speed_10m", "weather_code"]
        ]);

        error_log(json_encode($response->json()));
        if ($response->successful()) {
            // TODO: Check if there is a better way to deserialize/map a json response to a model.
            //   Doing it this way is pretty good and easier to maintain, but it's not as elegant than I'd like.
            $data = $response->json('current');
            $temperature =  $data['temperature_2m'];
            $humidity =  $data['relative_humidity_2m'];
            $windSpeed =  $data['wind_speed_10m'];
            $weatherStatus = $this->weatherCodes[$data['weather_code']];

            return new WeatherReport($location, $temperature, $humidity, $windSpeed, $weatherStatus);
        } else {
            // TODO: Learn Laravel error handling and replace the empty report with an exception
            return new WeatherReport($location, 0, 0, 0, "Unknown");
        }

    }

    /**
     * Search for a location by name. Returns a list of locations that are similar to the given value.
     *
     * TODO: Add additional parameters, such as count, and others supported by the API.
     *
     * @param string $name The name of the location to search for.
     * @return array|null An array of WeatherLocation objects or null if the search fails.
     */
    public function searchLocation($name) {
        // TODO: move search url to a const/config
        // TODO: Move to a separate class to handle meteo-specific API calls; will allow other APIs and testing
        $response = Http::get("https://geocoding-api.open-meteo.com/v1/search", [
            'name' => $name,
            'count' => 10,
        ]);

        if ($response->successful()) {
            $data = $response->json('results');

            // TODO: switch to array_map. I was running out of time so did it by hand.
            $locs = [];
            foreach ($data as $location) {
                error_log($location['name']. $location['country']. $location['latitude']. $location['longitude']);
                $locs[$location['id']] = new WeatherLocation($location['id'], $location['name'], $location['country'], $location['latitude'], $location['longitude']);
            }
            return $locs;
        } else {
            // TODO: Learn laravel error handling and replace with an exception.
            return null;
        }
    }
}
