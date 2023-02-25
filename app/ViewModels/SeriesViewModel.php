<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class SeriesViewModel extends ViewModel
{
    public $popular;
    public $topRated;
    public $genres;


    public function __construct($popular, $topRated, $genres)
    {
        $this->popular = $popular;
        $this->topRated = $topRated;
        $this->genres = $genres;
    }

    public function popular()
    {
        return $this->formatSeries($this->popular);
    }

    public function topRated()
    {
        return $this->formatSeries($this->topRated);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
                return [$genre['id'] => $genre['name']];
            });
    }

    private function formatSeries($series)
    {
        return collect($series)->map(function($tvshow)
        {
            $genresFormatted = collect($tvshow['genre_ids'])->mapWithKeys(function($value){
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($tvshow)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$tvshow['poster_path'],
                'vote_average' => $tvshow['vote_average'] * 10 .'%',
                'first_air_date' => Carbon::parse($tvshow['first_air_date'])->format('M d Y'),
                'genres' => $genresFormatted,
            ]);
        });
    }
}
