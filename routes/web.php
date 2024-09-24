<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\HomeController;

// Route::inertia('/', 'Home')->name('home');
Route::get('/example', [ExampleController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('home');