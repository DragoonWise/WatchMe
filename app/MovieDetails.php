<?php

namespace App;

class MovieDetails
{
    public function __construct($imdb)
    {

    }

    public static function ByImdb($imdb)
    {
        return new MovieDetails($imdb);
    }
}
