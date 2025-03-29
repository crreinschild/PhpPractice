<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="bg-">
        <x-layouts.app.navigation />
        {{ $slot }}
        <x-layouts.app.footer />
    </body>
</html>
