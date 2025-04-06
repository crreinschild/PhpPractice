<?php

namespace App\Livewire;

use App\Models\WeatherLocation;
use App\Services\WeatherService;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

/**
 * General weather component to display the weather forecast for a specific location.
 *
 * @package App\Livewire
 *
 * @property WeatherService $weather Injected weather service that handles fetching the weather data.
 * @property WeatherLocation $selectedLocation The specific location to display the weather for.
 * @property int $temperature The current temperature at the selected location.
 * @property int $humidity The current humidity at the selected location.
 * @property int $windSpeed The current wind speed at the selected location.
 * @property string $weatherStatus The current weather status (Sunny/Rainy/etc) at the selected location.
 */
class Weather extends Component
{
    protected WeatherService $weather;
    private $selectedLocation;
    public $temperature;
    public $humidity;
    public $windSpeed;
    public $weatherStatus;

    /**
     * Constructor to initialize the weather service.
     *
     * @param WeatherService $weather The weather service instance.
     */
    public function mount(WeatherService $weather)
    {
        $this->weather = $weather;
    }

    /**
     * Boot method to set the weather service on each request.
     * TODO: Verify if this is needed if the mount method is already loading the weather service.
     *
     * @param WeatherService $weather The weather service instance.
     */
    public function boot(WeatherService $weather)
    {
        $this->weather = $weather;
    }

    /**
     * Fetches the weather data for the selected location.
     */
    public function getWeather() {
        // TODO: Replace with the real proper way to get data from the WeatherSearch component.
        if(Cache::has('location')) {
            $this->selectedLocation = Cache::get('location');
        } else if($this->selectedLocation == null) {
            $this->selectedLocation = new WeatherLocation(1, 'Raleigh', 'United States', 35.7721, -78.6386);
        }

        if ($this->selectedLocation) {
            // TODO: See if I can simply render the WeatherReport object in the view
            // This would allow for easily expanding on the types of weather data that can be displayed.
            $weatherReport = $this->weather->getWeather($this->selectedLocation);
            $this->temperature = $weatherReport->temperature;
            $this->humidity = $weatherReport->humidity;
            $this->windSpeed = $weatherReport->windSpeed;
            $this->weatherStatus = $weatherReport->weatherStatus;
        } else {
            // TODO: Handle the soft failure case where weather data is attempted to be fetched for a null location.
            // It would be a better user experience to show a message indicating that a location must be selected.
            $this->temperature = null;
            $this->humidity = null;
            $this->windSpeed = null;
            $this->weatherStatus = null;
        }
    }

    /**
     * Renders the weather component view.
     *
     * @return \Illuminate\View\View The view for the weather component.
     */
    public function render()
    {
        return view('livewire.weather');
    }
}
