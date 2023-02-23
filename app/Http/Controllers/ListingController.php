<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\ViewModels\MovieViewModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\ViewModels\ListingsViewModel;

class ListingController extends Controller
{
    public function index()
    {
        $popular = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];


        $nowPlaying = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];


        // $genres = collect($genresArray)->mapWithKeys(function ($genre) {
        //     return [$genre['id'] => $genre['name']];
        // });

        // dump($popular);
        // dump($nowPlaying);

        // return view('listings.index', [
        //     'popular' => $popular,
        //     'genres' => $genres,
        //     'nowPlaying' => $nowPlaying,
        // ]);


        $viewModel = new ListingsViewModel(
            $popular,
            $nowPlaying,
            $genres
        );

        return view('listings.index', $viewModel);
       
    }

    public function show($id){

        $details = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/movie/$id?append_to_response=credits,videos,images")
            ->json();
        // dump($details);

        // $certifications = Http::withToken(config('services.tmdb.token'))
        //     ->get("https://api.themoviedb.org/3/certification/movie/list")
        //     ->json();
        // dump($certifications);

        $comments = Comment::find_by_movieId($id);
        // dump($comments);


        $viewModel = new MovieViewModel($details);

        // return view('listings.show', [
        //     'details' => $details,

        //     'comments' => $comments,

        // ]); 

        return view('listings.show', $viewModel, ['comments' => $comments]); 
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