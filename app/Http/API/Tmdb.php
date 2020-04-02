<?php

namespace App\Http\API;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class Tmdb
{
    protected $client;
    protected $startrequest;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->startrequest = '?api_key=' . env('TMDB_KEY');
    }

    public function all(int $page = 1)
    {
        $user = Auth::user();
        $adult = ($user->parental_control??false) ? '&include_adult=false' : '&include_adult=true';
        return $this->endpointRequest('/3/discover/movie' . $this->startrequest . "&language=fr-FR&region=Fr&sort_by=popularity.desc$adult&include_video=false&page=$page");
    }

    public function findById($id)
    {
        return $this->endpointRequest("/3/movie/{$id}{$this->startrequest}&language=fr-FR");
    }

    public function findByName($name,bool $pc, int $page = 1)
    {
        $adult = $pc ? '&include_adult=false' : '&include_adult=true';
        return $this->endpointRequest("/3/search/movie{$this->startrequest}&language=fr-FR&region=Fr&sort_by=popularity.desc$adult&include_video=false&page=$page&query=" . htmlspecialchars($name));
    }

    // https://api.themoviedb.org/3/movie/popular?api_key=07781e9d3ce562b41e44f16649ef204f&language=fr-FR&page=1
    public function getPopulars(int $page = 1)
    {
        $user = Auth::user();
        $adult = ($user->parental_control??false) ? '&include_adult=false' : '&include_adult=true';
        return $this->endpointRequest('/3/movie/popular' . $this->startrequest . "$adult&language=fr-FR&page=$page");
    }

    // https://api.themoviedb.org/3/discover/movie?api_key=07781e9d3ce562b41e44f16649ef204f&language=fr-FR&sort_by=release_date.asc&include_adult=false&include_video=true&page=1&primary_release_year=2020
    public function getNews(int $page = 1)
    {
        $user = Auth::user();
        $adult = ($user->parental_control??false) ? '&include_adult=false' : '&include_adult=true';
        return $this->endpointRequest('/3/discover/movie' . $this->startrequest . "&language=fr-FR&region=Fr&sort_by=release_date.desc$adult&include_video=true&with_release_type=3%7C2&vote_count.gte=1&primary_release_year=2020&page=$page");
    }

    // https://api.themoviedb.org/3/movie/36647?api_key=07781e9d3ce562b41e44f16649ef204f&language=en-US
    public function getDetails(int $imdb)
    {
        return $this->endpointRequest('/3/movie/'.$imdb . $this->startrequest . '&language=fr-FR');
    }

    public function getVideos(int $imdb)
    {
        return $this->endpointRequest('/3/movie/'.$imdb .'/videos'. $this->startrequest . '&language=fr-FR');
    }

    public function endpointRequest($url)
    {
        try {
            $response = $this->client->request('GET', $url);
        } catch (\Exception $e) {
            return [];
        }

        return $this->response_handler($response->getBody()->getContents());
    }

    public function response_handler($response)
    {
        if ($response) {
            return json_decode($response);
        }

        return [];
    }
}
