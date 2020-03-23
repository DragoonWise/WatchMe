<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * Access test to admin dashboard.
     *
     * @return void
     */
    public function testDashboardAccess()
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
    }

    /**
     * Access test to admin dashboard.
     *
     * @return void
     */
    public function testUsersAccess()
    {
        $response = $this->get('/admin/users');

        $response->assertStatus(200);
    }

    /**
     * Access test to admin dashboard.
     *
     * @return void
     */
    public function testUserAccess()
    {
        $response = $this->get('/admin/user/1');

        $response->assertStatus(200);
    }
}
