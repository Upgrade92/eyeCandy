<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
    public $details;
    public $comments;
    public function __construct($details, $comments)
    {
        $this -> details = $details;
        $this -> comments = $comments;
    }

    public function details()
    {
        // return $this->details;
        return collect($this->details)->merge([
            'poster_path' => $this->details['poster_path']
                ? 'https://image.tmdb.org/t/p/w300'.$this->details['poster_path']
                : asset('/images/no-cover.png'),
            'vote_average' => number_format($this->details['vote_average'] * 10, 0) .'%',
            'first_air_date' => Carbon::parse($this->details['first_air_date'])->format('M d Y'),
            'genres' => collect($this->details['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->details['credits']['crew'])->take(3),
            'cast' => collect($this->details['credits']['cast'])->take(5),
            'images' => collect($this->details['images']['backdrops'])->take(6),
        ]);
    }

    public function comments()
    {
        return $this->comments;
    }
}
