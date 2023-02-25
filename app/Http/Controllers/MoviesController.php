<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\ViewModels\MovieViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\MoviesViewModel;

class MoviesController extends Controller
{
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


        // dump($popular);

        $viewModel = new MoviesViewModel(
            $popular,
            $nowPlaying,
            $genres
        );

        return view('movies.index', $viewModel);
       
    }

    public function show($id){

        $details = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/movie/$id?append_to_response=credits,videos,images")
            ->json();

        // $certifications = Http::withToken(config('services.tmdb.token'))
        //     ->get("https://api.themoviedb.org/3/certification/movie/list")
        //     ->json();
        // dump($certifications);

        $comments = Comment::find_by_movieId($id);
        $viewModel = new MovieViewModel($details, $comments);

        return view('movies.show', $viewModel); 
    }



    // Store Comment 
    public function store(Request $request,$movie_id)
    {
        $formFields = $request->validate([
            'content' => 'required',
        ]);
        Comment::store($formFields,$movie_id);
        return back()->with('message','comment created!');
    }

}