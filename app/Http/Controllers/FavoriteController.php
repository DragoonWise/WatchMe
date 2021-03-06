<?php

namespace App\Http\Controllers;

use App\LinkUserMovie;
use App\Movie;
use Illuminate\Http\Request;
use Auth;
use DB;

class FavoriteController extends Controller
{
    public function add(Request $request)
    {
        $movie = Movie::Where('id', $request['movie_id'])
            ->firstOrFail();
        if ($request->ajax()) {
            $movie->setFavorite(!$movie->isFavorite());
        }
        return json_encode(['movie_id'=>$request['movie_id']]);
    }
}
