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
		return $this->endpointRequest('/dummy/post/'.$id);
	}

    public function findByName($name,int $page = 1)
	{
		return $this->endpointRequest("/3/search/movie{$this->startrequest}&language=fr-FR&sort_by=popularity.desc&include_adult=false&include_video=false&page=$page&query=".htmlspecialchars($name));
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
