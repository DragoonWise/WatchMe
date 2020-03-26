<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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

    public static function findByName($name)
    {
        $result = Movie::where('title', $name)->first();

        if ($result)
            return $result;
        return self::getAPIByName($name);
    }
}
