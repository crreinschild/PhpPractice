<?php

namespace App\Livewire;

use App\Services\WeatherService;
use Livewire\Component;

class Weather extends Component
{
    protected WeatherService $weather;
    public $location = ['latitude' => 35.7721, 'longitude' => -78.6386];
    public $temperature;
    public $humidity;
    public $windSpeed;
    public $weatherStatus;

    public function mount(WeatherService $weather)
    {
        $this->weather = $weather;
    }

    public function boot(WeatherService $weather)
    {
        $this->weather = $weather;
    }

    public function getWeather() {
        if ($this->location) {
            // Simulate fetching weather data
            $weatherReport = $this->weather->getWeather($this->location);
            $this->temperature = $weatherReport->temperature;
            $this->humidity = $weatherReport->humidity;
            $this->windSpeed = $weatherReport->windSpeed;
            $this->weatherStatus = $weatherReport->weatherStatus;
        } else {
            $this->temperature = null;
            $this->humidity = null;
            $this->windSpeed = null;
            $this->weatherStatus = null;
        }
    }

    public function render()
    {
        return view('livewire.weather');
    }
}
