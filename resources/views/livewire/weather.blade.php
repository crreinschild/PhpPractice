<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div>
        <p>Current Temperature: <span>{{ $temperature }}</span></p>
        <p>Current Condition: <span>{{ $weatherStatus }}</span></p>
    </div>
    <div>
        <h2>Additional Details</h2>
        <p>Humidity: <span>{{ $windSpeed }}%</span></p>
        <p>Wind Speed: <span>{{ $humidity }}</span></p>
    </div>
    <button wire:click="getWeather"  class="text-white end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Refresh</button>
</div>
