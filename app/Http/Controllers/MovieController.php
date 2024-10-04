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
        $casts = collect(Http::get('https://api.themoviedb.org/3/movie/'.$movie_id.'/credits?language=en-US&api_key='.$key)->json()['cast'])->slice(0, 50);
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
        $page = $request->input('page', 1);
        $genres = $request->input('genres');
        $genrelist = Http::get('https://api.themoviedb.org/3/genre/movie/list?language=en&api_key='.$key)->json();
        if(!$query){
            $search = Http::get('https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page='.$page.'&sort_by=popularity.desc&with_genres='.$genres.'&api_key='.$key)->json();
        }
        else{
            $search = Http::get('https://api.themoviedb.org/3/search/movie?query='.$query.'&include_adult=false&language=en-US&page='.$page.'&api_key='.$key)->json();
        }
        return Inertia::render('MovieSearch', [
            'movies' => $search,
            'query' => $query,
            'genres' => $genres,
            'genrelist' => $genrelist
        ]);
    }
}
