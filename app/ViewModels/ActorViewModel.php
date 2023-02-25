<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{

    public $actor;
    public $social;
    public $credits;

    public function __construct($actor, $social, $credits)
    {
        $this -> actor = $actor;
        $this -> social = $social;
        $this -> credits = $credits;
    }

    public function actor()
    {
        return collect($this -> actor)->merge([
            'birthday' => Carbon::parse($this->actor['birthday'])->format('M d, Y'),
            'age' => Carbon::parse($this->actor['birthday'])->age,
            'profile_path' => $this->actor['profile_path']
                ? 'https://image.tmdb.org/t/p/w300'.$this->actor['profile_path']
                : 'https://via.placeholder.com/300x400',
        ]);
    }

    public function social()
    {
        return collect($this->social)->merge([
            'facebook' => $this->social['facebook_id'] 
                ? 'https://facebook.com/'.$this->social['facebook_id'] 
                : null,
            'instagram' => $this->social['instagram_id']
                ? 'https://instagram.com/'.$this->social['instagram_id']
                : null,
            'twitter' => $this->social['twitter_id']
                ? 'https://twitter.com'.$this->social['twitter_id']
                : null,
        ]);
    }

    public function knownFor()
    {
        $castTitles = collect($this->credits)->get('cast');


        return collect($castTitles)->sortbyDesc('popularity')->take(4)->map(function($title){

            if(isset($title['title'])){
                $name = $title['title'];
            } elseif(isset($title['name'])){
                $name = $title['name'];
            } else{
                $name = '';
            }

            return collect($title)->merge([
                'poster_path' => $title['poster_path']
                    ? 'https://image.tmdb.org/t/p/w185'.$title['poster_path']
                    : 'https:via.placeholder.com/185x278',
                'title' => $name,
                'linkToPage' => $title['media_type'] == 'movie'
                    ? '/movies/'.$title['id']
                    : '/series/'.$title['id'],
            ]);
        });
    }

    public function credits()
    {
        $castTitles = collect($this->credits)->get('cast');

        return collect($castTitles)
            ->map(function($title){

                if(isset($title['release_date'])){
                    $releaseDate = $title['release_date'];
                } elseif(isset($title['first_air_date'])){
                    $releaseDate = $title['first_air_date'];
                } else{
                    $releaseDate = '';
                }

                if(isset($title['title'])){
                    $name = $title['title'];
                } elseif(isset($title['name'])){
                    $name = $title['name'];
                } else{
                    $name = '';
                }

                return collect($title)->merge([
                    'release_date' => $releaseDate,
                    'title' => $name,
                    'release_year' => isset($releaseDate) 
                        ? Carbon::parse($releaseDate)->format('Y')
                        : 'Future',
                    'character' => isset($title['character'])
                        ? 'as '.$title['character']
                        : '',
                    
                ]);

            })->sortByDesc('release_date')->take(20);
    }
}
