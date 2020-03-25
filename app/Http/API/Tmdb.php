<?php
namespace App\Http\API;

use GuzzleHttp\Client;

class Tmdb
{
	protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function all()
	{
		return $this->endpointRequest('/3/discover/movie'.'?api_key='.env('TMDB_KEY').'&language=fr-FR&sort_by=popularity.desc&include_adult=false&include_video=false&page=1');
	}

	public function findById($id)
	{
		return $this->endpointRequest('/dummy/post/'.$id);
	}

	public function endpointRequest($url)
	{
        // dd($url);
		try {
            $response = $this->client->request('GET', $url);
            // dd($response);
		} catch (\Exception $e) {
            dd($e);
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
