<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_logged_in_user_can_add_gear()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        
        $response = $this->get('/gear/index');

        $response->assertStatus(200);
    }
}
