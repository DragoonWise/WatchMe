<?php

namespace App;

use Illuminate\Support\Facades\Http;

class MovieVideos
{
    public static function ByImdb($imdb)
    {
        $res = Http::get('http://localhost/WatchMe/public/' . 'api/movie/'.$imdb.'/videos');
        $results = $res->json();
        $movies = $results['results'];

    }
}
