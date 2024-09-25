<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MovieController extends Controller
{
    public function index($movie_id){
        $key = config('services.tmdb.key');
        $movie = Http::get('https://api.themoviedb.org/3/movie/'.$movie_id.'?api_key='.$key)->json();
        return Inertia::render('Details', [
            'movie' => $movie,
        ]);
    }
}
