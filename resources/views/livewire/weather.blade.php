<div class="p-6">
    <p>Automatic Weather refresh is a work in progress. Please select the location and click Refresh</p>
    <button wire:click="getWeather"  class="text-white end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Refresh</button>

    <div class="flex flex-wrap p-4 gap-4 mx-auto justify-center">
        <x-weather-gauge :name="'Condition'" :value="$weatherStatus" />
        <x-weather-gauge :name="'Temperature'" :value="$temperature" :units="'°C'" />
        <x-weather-gauge :name="'Humidity'" :value="$humidity" :units="'%'" />
        <x-weather-gauge :name="'Wind Speed'" :value="$windSpeed" :units="'km/h'" />
    </div>
</div>
