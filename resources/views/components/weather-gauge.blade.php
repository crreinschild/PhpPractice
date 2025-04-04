<div class="w-full max-w-48 p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $name }}</p>
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $value ?? 0 }} @isset($units) {{ ' ' . $units }}@endisset</h5>
</div>
