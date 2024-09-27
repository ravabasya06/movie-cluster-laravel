<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Inertia\Inertia;

class MovieController extends Controller
{
    public function index($movie_id){
        $key = config('services.tmdb.key');
        $movie = Http::get('https://api.themoviedb.org/3/movie/'.$movie_id.'?append_to_response=release_dates&api_key='.$key)->json();
        $recommendation_movies = Http::get('https://api.themoviedb.org/3/movie/'.$movie_id.'/recommendations?language=en-US&page=1&api_key='.$key)->json();
        $casts = Http::get('https://api.themoviedb.org/3/movie/'.$movie_id.'/credits?language=en-US&api_key='.$key)->json();
        $release_date = Carbon::parse($movie['release_date'])->format('d F Y');
            return Inertia::render('Details', [
            'movie' => $movie,
            'release_date' => $release_date,
            'recommendation_movies' => $recommendation_movies,
            'casts' => $casts
        ]);
    }

    public function search(Request $request){
        $key = config('services.tmdb.key');
        $query = $request->input('search_query');
        $results = Http::get('https://api.themoviedb.org/3/search/movie?query='.$query.'&include_adult=false&language=en-US&page=1&api_key='.$key)->json();
        
        // $spbu
        //     ->where('spbus.spbu_id', 'LIKE', "%{$query}%")
        //     ->orWhere('spbus.name', 'LIKE', "%{$query}%")
        //     ->orWhere('spbus.road', 'LIKE', "%{$query}%")
        //     ->orWhere('spbus.city', 'LIKE', "%{$query}%")
        //     ->orWhere('provinces.name', 'LIKE', "%{$query}%")
        //     ->orWhere('islands.name', 'LIKE', "%{$query}%")
        //     ->paginate(16)->withQueryString()->onEachSide(1);

        return Inertia::render('MovieSearch', [
            'movies' => $results,
            'query' => $query,
        ]);
    }
}
