<?php

namespace App\Http\Controllers;

use App\Http\Requests\Search;
use Illuminate\Http\Request;
use App\Movie;
use App\Http\API\ImageHelper;

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

        return view('home')->with('tops', $tops)->with('news', $news)->with('images', $images);
    }

    public function catalogue()
    {
        $all = Movie::all()->sortBy('title');
        $images = new ImageHelper();
        return view('catalogue')->with('all', $all)->with('images', $images);
    }

    public function favoris()
    {
        $favorites = Movie::getFavorites();
        $images = new ImageHelper();
        return view('favoris')->with('favorites', $favorites)->with('images', $images);
    }

    public function movie($id)
    {
        $movie = Movie::find($id);
        $details = $movie->getDetails();
        $videos = $movie->getVideos();
        $images = new ImageHelper();
        return view('movie')->with('movie',$movie)->with('details', $details)->with('videos', $videos)->with('images', $images);
    }

    public function search(Search $request)
    {
        $results = Movie::search($request->search);
        $images = new ImageHelper();
        return view('search')->with('results', $results)->with('images', $images);
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
