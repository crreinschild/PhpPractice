<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Weather') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold underline">Weather Dashboard</h1>
                    <p>This is a starting point for your assignment.</p>
                    <div>
                        <p>Current Temperature: <span>XX</span></p>
                        <p>Current Condition: Sunny</p>
                    </div>
                    <div>
                        <h2>Additional Details</h2>
                        <p>Humidity: <span>X%</span></p>
                        <p>Wind Speed: <span>X</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
