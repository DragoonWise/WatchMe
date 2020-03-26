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
    public function movies(?int $page = 1)
    {
        $tmdb = $this->tmdb->all($page);
        return json_encode($tmdb);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function movieById($id)
    {
        $tmdb = $this->tmdb->findById($id);
        return json_encode($tmdb);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function movieByName($name, ?int $page = 1)
    {
        $tmdb = $this->tmdb->findByName($name, $page);
        return json_encode($tmdb);
    }
}
