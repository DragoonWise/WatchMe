<?php

namespace App\Http\Controllers;

use App\Http\API\Tmdb;
use Illuminate\Http\Request;

class ApiTmdbController extends Controller
{
    protected $tmdb;

    public function __construct(Tmdb $tmdb)
    {
    	$this->tmdb = $tmdb;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function movies()
    {
        $tmdb = $this->tmdb->all();

    	return compact('tmdb');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


}
