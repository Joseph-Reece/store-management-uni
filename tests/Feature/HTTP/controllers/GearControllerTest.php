<?php

namespace Tests\Feature\HTTP\controllers;

use App\Models\Gear;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GearControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_logged_in_user_can_display_gear_index_page()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/gear/index');

        $response->assertStatus(200);
    }

    public function test_user_can_store_gear()
    {
        // create a user
        $user = User::factory()->create();

        // act as the user is logged in to cross middleware auth
        $this->actingAs($user);

        // test the post request
        $response = $this->post('/gear/store',  [
            'name' => 'Racket',
            'slug' => 'Racket',
            'brand'=> 'nike',
            'image' => '123.jpg',
            'quantity'=>20,
            'price'=>100,
            'category'=>1,
            'sport'=>1,
        ]);

        // assert we were redirected to the correct route
        $response->assertStatus(302);

        // Find the last gear created
        $gear = Gear::first();

        // assert we only have one book in the db
        $this->assertEquals(1, Gear::count());

        // assert that the book was stored using the correct data
        $this->assertEquals('Racket', $gear->name);
        $this->assertEquals('racket', $gear->slug);
        $this->assertEquals('nike', $gear->brand);
        $this->assertEquals('123.jpg', $gear->image);
        $this->assertEquals(20, $gear->quantity);
        $this->assertEquals(100, $gear->price);
        $this->assertEquals(1, $gear->category);
        $this->assertEquals(1, $gear->sport);


    }
}
