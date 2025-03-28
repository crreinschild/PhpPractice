@extends('layouts.default')

@section('title', 'Welcome to Laravel Starter')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection


@section('content')
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
@endsection
