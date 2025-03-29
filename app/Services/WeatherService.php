<?php

namespace App\Services;

use App\Models\WeatherReport;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherService
{
    public $url = "https://api.open-meteo.com/v1/forecast";

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

    public function getWeather($location) : WeatherReport
    {
        $response = Http::get($this->url, [
            'latitude' => $location['latitude'],
            'longitude' => $location['longitude'],
            "current" => ["temperature_2m", "relative_humidity_2m", "wind_speed_10m", "weather_code"]
        ]);

        if ($response->successful()) {
            $data = $response->json('current');
            $temperature =  $data['temperature_2m'];
            $humidity =  $data['relative_humidity_2m'];
            $windSpeed =  $data['wind_speed_10m'];
            $weatherStatus = $this->weatherCodes[$data['weather_code']];

            return new WeatherReport($location, $temperature, $humidity, $windSpeed, $weatherStatus);
        } else {
            // learn to handle errors
            // Simulate fetching weather data
            return new WeatherReport($location, 0, 0, 0, "Unknown");
        }

    }
}
