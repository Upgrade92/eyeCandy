<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $details;
    // public $comments;
    public function __construct($details)
    {
        $this -> details = $details;
        // $this -> comments = $comments;
    }

    public function details()
    {
        // return $this->details;
        return collect($this->details)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$this->details['poster_path'],
            'vote_average' => number_format($this->details['vote_average'] * 10,0) .'%',
            'release_date' => Carbon::parse($this->details['release_date'])->format('M d Y'),
        ]);
    }

    // public function comments()
    // {
    //     return collect($this->comments());
    // }
}
