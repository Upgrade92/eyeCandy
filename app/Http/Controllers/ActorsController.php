<?php

namespace App\Http\Controllers;

use App\ViewModels\ActorViewModel;
use App\ViewModels\ActorsViewModel;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{

    // Show Popular Actors
    public function index($page=1)
    {
        abort_if($page > 500, 204);

        $popularActors = collect(Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/popular?page='.$page)
            ->json()['results']);

        $viewModel = new ActorsViewModel($popularActors, $page);

        return view('actors.index', $viewModel);
    }


    //Schow Single Actor
    public function show($id)
    {

        $actor = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/person/$id")
            ->json();

        $social = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/person/$id/external_ids")
            ->json();

        $credits = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/person/$id/combined_credits")
            ->json();


        if(isset($actor['success'])){
            return redirect('/')->with('msessage','not found');
        }

        $viewModel = new ActorViewModel($actor, $social, $credits);

        return view('actors.show',$viewModel);
    }

    
}
