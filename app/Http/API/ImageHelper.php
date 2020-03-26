<?php

namespace App\Http\API;

class ImageHelper
{
    protected $baseURI;

    public function __construct()
    {
        $this->baseURI = env('TMDB_IMAGE_BASE_URL');
    }

    public function getImageURL($partialURL)
    {
        return $this->baseURI.$partialURL;
    }
}
