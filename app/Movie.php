<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference', 'title', 'urlMiniature',
    ];

    public static function findByName($name)
    {
        $result = Movie::where('title',$name)->first();

        if ($result)
         return $result;
        //  $movie = 
        //  dd($movie->all());

        // //  $token  = new ApiToken('07781e9d3ce562b41e44f16649ef204f');
        // //  $client = new Client($token);
        // //  $repository = new MovieRepository($client);
        // //  $movie = $repository->load(87421);
        //  $obj = new Movie();
        //  $obj->title = $movie['results'][0]['title'];
        // //  die('error');
        //  return $obj;
    }
}
