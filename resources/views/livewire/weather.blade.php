<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div>
        <p>Current Temperature: <span>{{ $temperature }}</span></p>
        <p>Current Condition: Sunny</p>
    </div>
    <div>
        <h2>Additional Details</h2>
        <p>Humidity: <span>X%</span></p>
        <p>Wind Speed: <span>X</span></p>
    </div>
    <button wire:click="getWeather">Refresh</button>
</div>
