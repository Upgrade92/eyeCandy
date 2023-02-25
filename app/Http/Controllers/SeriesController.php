<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\ViewModels\SeriesViewModel;
use App\ViewModels\TvShowViewModel;
use Illuminate\Support\Facades\Http;

class SeriesController extends Controller
{
    
    public function index()
    {
        $popular = collect(Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/popular')
            ->json()['results'])
            ->take(16);


        $topRated = collect(Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/top_rated')
            ->json()['results'])
            ->take(16);

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/tv/list')
            ->json()['genres'];


        $viewModel = new SeriesViewModel(
            $popular,
            $topRated,
            $genres
        );

        return view('series.index', $viewModel);
       
    }

    
    public function show($id){

        $details = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/tv/$id?append_to_response=credits,videos,images")
            ->json();

        $comments = Comment::find_by_movieId($id);
        $viewModel = new TvShowViewModel($details, $comments);

        // $viewModel = new TvShowViewModel($details);

        return view('series.show', $viewModel); 
    }

   
}
