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
     * @param  int|null  $page
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function movieDetails($id)
    {
        $tmdb = $this->tmdb->getDetails($id);
        return json_encode($tmdb);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function movieVideos($id)
    {
        $tmdb = $this->tmdb->getVideos($id);
        return json_encode($tmdb);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function movieByName($pc,$name, ?int $page = 1)
    {
        $tmdb = $this->tmdb->findByName($name,$pc, $page);
        return json_encode($tmdb);
    }

        /**
     * Display a listing of the resource.
     *
     * @param  int|null  $page
     * @return \Illuminate\Http\Response
     */
    public function populars(?int $page = 1)
    {
        $tmdb = $this->tmdb->getPopulars($page);
        return json_encode($tmdb);
    }

        /**
     * Display a listing of the resource.
     *
     * @param  int|null  $page
     * @return \Illuminate\Http\Response
     */
    public function news(?int $page = 1)
    {
        $tmdb = $this->tmdb->getNews($page);
        return json_encode($tmdb);
    }
}
