<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Starter - @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
@section('sidebar')
    This is the master sidebar.
@show

<div class="container">
    @yield('content')
</div>

@section('footer')
    The is the footer
@show
</body>
</html>
