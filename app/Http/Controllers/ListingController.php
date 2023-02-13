<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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

        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];


        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        // dump($popular);
        // dump($nowPlaying);

        return view('listings.index', [
            'popular' => $popular,
            'genres' => $genres,
            'nowPlaying' => $nowPlaying,
            // ,'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(10)
        ]);
    }

    public function show($id){

        $details = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/movie/$id?append_to_response=credits,videos,images")
            ->json();

        dump($details);

        $certifications = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/certification/movie/list")
            ->json();

        // dump($certifications);

        $comments = Comment::find_by_movieId($id);
        // $comments = Comment::all();
        // $comments = DB::table('comments')->where('movie_id',$id)->get();

        dump($comments);
        return view('listings.show', [
            'details' => $details,

            'comments' => $comments,

           ]);
    }

}