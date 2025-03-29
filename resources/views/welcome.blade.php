<x-layouts.app :title="__('Weather')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <h1 class="max-w-md mx-auto text-3xl font-bold underline">Weather Dashboard</h1>
        <livewire:weather-search />
        <livewire:weather />
    </div>
</x-layouts.app>
