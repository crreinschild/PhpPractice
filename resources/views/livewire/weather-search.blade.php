<div>
    <!-- Sourced from https://flowbite.com/docs/forms/search-input/ -->
    <form wire:submit="search" class="max-w-md mx-auto">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" wire:model.live.debounce.500ms="searchText" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Location" required />

            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 disabled:border-gray-200 disabled:bg-gray-50 disabled:text-gray-500 disabled:shadow-none dark:disabled:border-gray-700  dark:disabled:bg-gray-800/20">Search</button>

            <div class="absolute z-50 w-full mx-auto max-w-md bg-white rounded-xl shadow-xl dark:bg-neutral-800" style="display: {{!$locations ? 'none' : 'block'}}" >
                <div class="max-h-125 p-2 overflow-y-auto overflow-hidden" data-hs-combo-box-output-items-wrapper="">
                    <div>
                        @foreach ($locations as $location)
                            <div class="py-2 px-3 flex items-center gap-x-3 hover:bg-gray-100 rounded-lg dark:hover:bg-neutral-700" wire:click="selectLocation({{$location->id}})" >
                                <span class="text-sm text-gray-800 dark:text-neutral-200" >{{$location->city . ', ' . $location->country}}</span>
                                <span class="ms-auto text-xs text-gray-400 dark:text-neutral-500" >{{$location->latitude . ', ' . $location->longitude}}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- -->





    <div class="flex gap-4 mx-auto justify-center mt-4">
        <div class="col-md-6">
            <select wire:model="selected" wire:change="selectionChanged" class="form-control">
                <option value="-1" selected>Choose Location</option>
                @foreach ($locations as $location)
                    <option value="{{$location->id}}">{{$location->city . ', ' . $location->country}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
