<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * Access test to api index.
     *
     * @return void
     */
    public function testAPIMovies()
    {
        $response = $this->get('/api/movies');

        $response->assertStatus(200);
    }


}
