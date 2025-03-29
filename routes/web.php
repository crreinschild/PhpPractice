<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/counter', Counter::class);
