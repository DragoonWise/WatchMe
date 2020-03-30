<?php

namespace App\Http\Controllers;

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
        return view('catalogue');
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
