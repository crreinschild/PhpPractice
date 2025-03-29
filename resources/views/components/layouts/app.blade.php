<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body>
        <x-layouts.app.navigation />
        {{ $slot }}
    </body>
</html>
