<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(){
        $key = config('services.tmdb.key');
        $popular_movies = Http::get('https://api.themoviedb.org/3/movie/popular?language=en-US&page=1&api_key='.$key)->json();
        return Inertia::render('Home', [
            'popular_movies' => $popular_movies,
        ]);
    }
}
