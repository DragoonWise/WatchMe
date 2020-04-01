<?php

namespace App;

use Illuminate\Support\Facades\Http;

class MovieDetails
{
    //   "adult" => bool
    //   "budget" => int
    //   "genres" => array:2 [▶]
    //   "homepage" => url (string)
    //   "original_language" => "en"
    //   "original_title" => string
    //   "overview" => text
    //   "popularity" => float
    //   "production_companies" => array:9 [▶]
    //   "production_countries" => array:2 [▶]
    //   "release_date" => date(string Y-m-D)
    //   "revenue" => int
    //   "spoken_languages" => array:1 [▶]
    //   "status" => "Released" (string)
    //   "tagline" => short desc (string)
    //   "title" => string
    //   "vote_average" => float
    //   "vote_count" => int

    public function __construct($imdb)
    {
        $res = Http::get('http://localhost/WatchMe/public/' . 'api/movie/' . $imdb . '/details');
        $results = $res->json();
        $movies = $results;
        extract($movies);
    }

    public static function ByImdb($imdb)
    {
        return new MovieDetails($imdb);
    }
}
