<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\ViewModels\MovieViewModel;
use Illuminate\Support\Facades\Http;
use App\ViewModels\MoviesViewModel;

class MoviesController extends Controller
{

    // Get popular and now playing movies
    public function index()
    {
        $popular = collect(Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'])
            ->take(16);


        $nowPlaying = collect(Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'])
            ->take(16);

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];


        $viewModel = new MoviesViewModel(
            $popular,
            $nowPlaying,
            $genres
        );

        return view('movies.index', $viewModel);     
    }


    // Schow Single Movie
    public function show($id){

        $details = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/movie/$id?append_to_response=credits,videos,images")
            ->json();

        if(isset($details['success'])){
            return redirect('/')->with('msessage','not found');
        }
        
        $comments = Comment::find_by_movieId($id);
        $viewModel = new MovieViewModel($details, $comments);

        return view('movies.show', $viewModel); 
    }

}