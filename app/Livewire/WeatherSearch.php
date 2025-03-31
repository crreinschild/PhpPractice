<?php

namespace App\Livewire;

use App\Services\WeatherService;
use Livewire\Component;

/**
 * WeatherSearch Component
 *
 * Handles the logic for searching for a location to get the weather forecast for. When a user sets the search text,
 * it will fetch a list of locations close in name to the specified text. The desired location can then be selected.
 *
 * ASSESSMENT NOTE: The search function of this component is functioning as expected, however, when selecting the
 * location, it would appear that it instantiates a new WeatherSearch component instead of resolving the original
 * instance; the one that contains the list of locations. I originally tried to pass the full location object by binding
 * the selected location on the <select> element, but I learned very quickly that Livewire only supports simple (string)
 * values via this binding. I did not have the heart to attempt to serialize the object into a base64 json object.
 * I, instead, followed up by attempting to pass the ID of the location, but to my dismay, there was no list waiting for
 * me. Ultimately, even if I got it working, the intent is to pass the selected location to the Weather component, and
 * I don't know what the correct way to do that is. In hindsight, I should have the Weather component be a parent, and
 * make the Search and the set of weather graphs and gauges be children.
 * TODO: Find the best practice for passing data/state between Livewire components.
 *   I bet it's something like creating a session-scoped data service to broker the data (maybe backed by a database to
 *   assist in caching and persistence).
 *
 * @package App\Livewire
 *
 * @property string $searchText The text to search locations by. The results should be similar in name.
 * @property array $locations The list of locations returned from the search.
 * @property int|null $selected The location id of the selected location from the list.
 * @property WeatherService $weather The weather service instance used to fetch location data.
 */
class WeatherSearch extends Component
{
    public $searchText;

    private $locations = [];

    public $selected = null;

    protected WeatherService $weather;

    /**
     * Function to handle the event that a user has selected a location from the list.
     * Read the value of the `selected` property, and pull the location with the same id in the array.
     *
     * TODO: Find out why the location list is null (hint, this is likely a new instance when the function is called)
     */
    public function selectLocation($location) {
        if(!$this->locations) {
            error_log("No locations available");
        } else {
            $this->selected = $this->locations[$location];
            error_log("Selected location: " . json_encode($this->selected));
        }
    }

    /**
     * Check when properties are updated. This is used to detect when the user has changed the search text.
     *
     * Currently, if a user stops typing, it will trigger the search automatically. May be able to remove the button.
     */
    public function updated($property)
    {
        if ($property == 'searchText') {
            $this->search();
        }
        if ($property == 'selected') {
            // TODO: Should I use this as the trigger to get weather?
        }
    }

    /**
     * Constructor to initialize the weather service and locations.
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
     * Search for locations based on the set search text.
     */
    public function search()
    {
        if ($this->searchText) {
            $this->locations = $this->weather->searchLocation($this->searchText);
        } else {
            // TODO: Can we do something with exceptions or other error handling to trigger user friendly messages?
            $this->locations = [];
        }
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View The view for the component.
     */
    public function render()
    {
        return view('livewire.weather-search', ['locations' => $this->locations]);
    }
}
