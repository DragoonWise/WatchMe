<?php

namespace App;

use Illuminate\Support\Facades\Http;

class MovieVideos
{
    public $name;
    public $type;
    public $key;
    public $url;

    public static function ByImdb($imdb)
    {
        $res = Http::get('http://localhost/WatchMe/public/' . 'api/movie/' . $imdb . '/videos');
        $results = $res->json();
        $movies = $results['results'];
        $movieVideos = [];
        foreach ($movies as $movie) {
            $video = new MovieVideos();
            $video->name = $movie['name'];
            $video->type = $movie['type'];
            $video->key = $movie['key'];
            switch ($movie['site']) {
                case 'YouTube':
                    $video->url = 'https://www.youtube.com/embed/' . $movie['key'];
                    break;
                default:
                    break;
            }
            $movieVideos[] = $video;
        }
        return $movieVideos;
    }
}
