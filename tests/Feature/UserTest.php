<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_signup_screen_render()
    {
        $response = $this->get('/sign-up');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_new_users_store()
    {
        $response = $this->post('/user-store', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }






}
