<?php
namespace App\Http\API;

use GuzzleHttp\Client;

class Tmdb
{
    protected $client;
    protected $startrequest;

	public function __construct(Client $client)
	{
        $this->client = $client;
        $this->startrequest = '?api_key='.env('TMDB_KEY');
	}

	public function all(int $page = 1)
	{
		return $this->endpointRequest('/3/discover/movie'.$this->startrequest.'&language=fr-FR&sort_by=popularity.desc&include_adult=false&include_video=false&page='.$page);
	}

	public function findById($id)
	{
		return $this->endpointRequest("/3/movie/{$id}{$this->startrequest}&language=fr-FR");
	}

    public function findByName($name,int $page = 1)
	{
		return $this->endpointRequest("/3/search/movie{$this->startrequest}&language=fr-FR&sort_by=popularity.desc&include_adult=false&include_video=false&page=$page&query=".htmlspecialchars($name));
    }

    // https://api.themoviedb.org/3/movie/popular?api_key=07781e9d3ce562b41e44f16649ef204f&language=fr-FR&page=1
	public function getPopulars(int $page = 1)
	{
		return $this->endpointRequest('/3/movie/popular'.$this->startrequest.'&language=fr-FR&page='.$page);
	}

	public function endpointRequest($url)
	{
		try {
            $response = $this->client->request('GET', $url);
		} catch (\Exception $e) {
            return [];
		}

		return $this->response_handler($response->getBody()->getContents());
	}

	public function response_handler($response)
	{
		if ($response) {
			return json_decode($response);
		}

		return [];
	}
}
