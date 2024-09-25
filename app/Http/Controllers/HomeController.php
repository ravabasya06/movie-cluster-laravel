<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(){
        $key = config('services.tmdb.key');
        $popular_movies = Http::get('https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=popularity.desc&api_key='.$key)->json();
        $top_movies = Http::get('https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=vote_average.desc&without_genres=99,10755&vote_count.gte=200&api_key='.$key)->json();
        $trending_movies = Http::get('https://api.themoviedb.org/3/trending/movie/day?include_adult=false&include_video=false&language=en-US&page=1&api_key='.$key)->json();
        return Inertia::render('Home', [
            'popular_movies' => $popular_movies,
            'top_movies' => $top_movies,
            'trending_movies' => $trending_movies,
        ]);
    }
}
