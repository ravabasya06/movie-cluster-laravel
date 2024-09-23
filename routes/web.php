<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;

Route::inertia('/', 'Home')->name('home');
Route::get('/example', [ExampleController::class, 'index']);