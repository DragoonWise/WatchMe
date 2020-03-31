<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Request;

class Movie extends Model
{
    use SoftDeletes;
    // protected $apiTmdbController;

    // public function __construct(ApiTmdbController $apiTmdbController)
    // {
    //     $this->apiTmdbController = $apiTmdbController;
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference', 'title', 'urlMiniature',
    ];

    protected static function getAPIByName($name)
    {
        $res = Http::get('http://localhost/WatchMe/public/' . 'api/movie/name/' . $name);
        $results = $res->json()['results'];
        if ($results) {
            $movie = $results[0];
            $obj = new Movie();
            $obj->title = $movie['title'];
            $obj->reference = $movie['id'];
            $obj->urlMiniature = $movie['poster_path'];
            $obj->save();
            return $obj;
        }
        return null;
    }

    protected static function getAPIById($id)
    {
        $res = Http::get('http://localhost/WatchMe/public/' . 'api/movie/' . $id);
        $results = $res->json();
        $movie = $results;
        $obj = new Movie();
        $obj->title = $movie['title'];
        $obj->reference = $movie['id'];
        $obj->urlMiniature = $movie['poster_path'];
        $obj->save();
        return $obj;
    }

    public static function findByName($name)
    {
        $result = Movie::where('title', $name)->first();

        if ($result)
            return $result;
        return self::getAPIByName($name);
    }

    public static function findByTmdbId($id)
    {
        $result = Movie::where('reference', $id)->first();

        if ($result)
            return $result;
        return self::getAPIById($id);
    }

    public static function getPopulars(int $page = 1)
    {
        $res = Http::get('http://localhost/WatchMe/public/' . 'api/movies/populars/' . $page);
        $results = $res->json();
        $movies = $results['results'];
        // dd($movies);
        $return = [];
        foreach ($movies as $movie) {
            if ($movie['poster_path'])
                $return[] = self::findByTmdbId($movie['id']);
        }
        return $return;
    }

    public static function getNews(int $page = 1)
    {
        $res = Http::get('http://localhost/WatchMe/public/' . 'api/movies/news/' . $page);
        $results = $res->json();
        $movies = $results['results'];
        // dd($movies);
        $return = [];
        foreach ($movies as $movie) {
            // dd(date_create($movie['release_date']));
            if ($movie['poster_path'] && date_create($movie['release_date']) <= now())
                $return[] = self::findByTmdbId($movie['id']);
        }
        return $return;
    }

    public function isFavorite()
    {
        $favorite = LinkUserMovie::where('movie_id', $this->id)->where('user_id', Auth::user()->id)->where('type', 'favorite')->First();
        return ($favorite != null);
    }

    public function setFavorite(bool $state)
    {
        $movie_id = $this->id;
        $user_id = Auth::user()->id;
        $favorite = LinkUserMovie::where('movie_id', $movie_id)->where('user_id', $user_id)->where('type', 'favorite')->First();
        if (!$state && $favorite != null)
            $favorite->delete();
        if ($state && $favorite == null) {
            $favorite = new LinkUserMovie();
            $favorite->user_id = $user_id;
            $favorite->movie_id = $movie_id;
            $favorite->type = 'favorite';
            $favorite->created_at = now();
            $favorite->save();
        }
    }

    public function getDetails()
    {
        return MovieDetails::ByImdb($this->reference);
    }

    public function getVideos()
    {
        return MovieVideos::ByImdb($this->reference);
    }
}
