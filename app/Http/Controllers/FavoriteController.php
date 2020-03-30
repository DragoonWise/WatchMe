<?php

namespace App\Http\Controllers;

use App\LinkUserMovie;
use Illuminate\Http\Request;
use Auth;

class FavoriteController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user();
        if ($request->ajax()) {
            LinkUserMovie::create([
                'movie_id' => $request['movie_id'],
                'user_id' => $user->id,
                'Type' => 'favorite',
                'ratings' => '1'
            ]);
        }
        return response()->json();
    }
}
