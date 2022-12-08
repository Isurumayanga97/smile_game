<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_login_screen_render()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_users_authenticate()
    {
        $user = User::factory()->create();

        $response = $this->post('/', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * @return void
     */
    public function test_users_un_authenticate()
    {
        $user = User::factory()->create();

        $this->post('/', [
            'email' => $user->email,
            'password' => '1234',
        ]);

        $this->assertGuest();
    }

}
