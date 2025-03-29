<?php

namespace App\Livewire;

use App\Services\WeatherService;
use Livewire\Component;

class WeatherSearch extends Component
{
    public $searchText;

    private $locations = [];

    public $selected = null;

    protected WeatherService $weather;

    public function selectionChanged() {
        if ($this->selected) {
            error_log(json_encode($this->locations));
            $selectedLocation = $this->locations[$this->selected];
            error_log("selectionChanged: " . $selectedLocation);
        }
    }

    public function mount(WeatherService $weather, $locations = [])
    {
        $this->locations = $locations;
        $this->weather = $weather;
    }

    public function boot(WeatherService $weather)
    {
        $this->weather = $weather;
    }


    public function search()
    {
        global $globalLocations;
        error_log("search called");
        if ($this->searchText) {
            error_log("searching for: " . $this->searchText);
            $this->locations = $this->weather->searchLocation($this->searchText);
            $globalLocations = $this->locations;
            error_log("locations found: " . json_encode($globalLocations));
        } else {
            $this->locations = [];
        }
    }

    public function render()
    {
        return view('livewire.weather-search', ['locations' => $this->locations]);
    }
}
