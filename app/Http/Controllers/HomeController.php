<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Http\API\ImageHelper;
use DB;
use App\LinkUserMovie;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tops = Movie::getPopulars();
        $news = Movie::getNews();
        $images = new ImageHelper();
        $user = Auth::user();
        $favorites = LinKUserMovie::select('movie_id')->where('user_id', $user->id)->where('type', 'favorite')->get();
        $fav[0] = 0;
        foreach ($favorites as $value) {
            $fav[$value['movie_id']] = $value['movie_id'];
        }


        return view('home')->with('tops', $tops)->with('news', $news)->with('favorite', $fav)->with('images', $images);
    }

    public function catalogue()
    {
        $all = DB::table('movies')->select('*')->get();
        $images = new ImageHelper();
        return view('catalogue')->with('all', $all)->with('images', $images);
    }

    public function favoris()
    {
        return view('favoris');
    }

    public function mentions()
    {
        return view('mentions');
    }

    public function cgu()
    {
        return view('cgu');
    }

    public function contact()
    {
        return view('contact');
    }
}
