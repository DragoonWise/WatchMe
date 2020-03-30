<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

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
        return view('home')->with('tops', $tops);
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
