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
    public function testAdminDashboardWithoutAccess()
    {
        $response = $this->get('/admin');

        $response->assertStatus(302);
    }

    /**
     * Access test to admin dashboard.
     *
     * @return void
     */
    public function testAdminUsersWithoutAccess()
    {
        $response = $this->get('/admin/users');

        $response->assertStatus(302);
    }

    /**
     * Access test to admin dashboard.
     *
     * @return void
     */
    public function testAdminUserWithoutAccess()
    {
        $response = $this->get('/admin/user/1');

        $response->assertStatus(302);
    }
}
