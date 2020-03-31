<?php

namespace App\Http\Controllers;

use App\LinkUserMovie;
use Illuminate\Http\Request;
use Auth;
use DB;

class FavoriteController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user();
        $favorites = LinKUserMovie::select('movie_id')
            ->where('user_id', $user->id)
            ->where('movie_id', $request['movie_id'])
            ->where('type', 'favorite')
            ->count();

        if ($request->ajax()) {
            if ($favorites == 0) {
                LinkUserMovie::create([
                    'movie_id' => $request['movie_id'],
                    'user_id' => $user->id,
                    'Type' => 'favorite',
                    'ratings' => '1'
                ]);
            } else {
                DB::table('link_user_movies')->where('movie_id', $request['movie_id'])
                    ->where('user_id', $user->id)
                    ->where('type', 'favorite')
                    ->delete();
            }
        }
        return response()->json();
    }
}
