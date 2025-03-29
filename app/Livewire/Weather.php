<?php

namespace App\Livewire;

use App\Models\WeatherLocation;
use App\Services\WeatherService;
use Livewire\Component;

class Weather extends Component
{
    protected WeatherService $weather;
    private $selectedLocation;
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
        // test
        if($this->selectedLocation == null) {
            $this->selectedLocation = new WeatherLocation(1, 'Raleigh', 'United States', 35.7721, -78.6386);
        }

        if ($this->selectedLocation) {
            // Simulate fetching weather data
            $weatherReport = $this->weather->getWeather($this->selectedLocation);
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
