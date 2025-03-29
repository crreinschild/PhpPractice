<?php

namespace App\Livewire;

use Livewire\Component;

class Weather extends Component
{
    public $location = [35.7721, -78.6386];
    public $temperature;


    public function getWeather() {
        if ($this->location) {
            // Simulate fetching weather data
            $this->temperature = rand(-10, 35); // Random temperature for demonstration
        } else {
            $this->temperature = null;
        }
    }

    public function render()
    {
        return view('livewire.weather');
    }
}
