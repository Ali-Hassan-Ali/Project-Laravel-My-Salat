<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_creates_user_and_returns_token()
    {
        $payload = [
            'username' => 'Test User',
            'region' => 'Test Region',
            'phone' => '0501234567',
        ];

        $response = $this->postJson('/api/register', $payload);

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => ['user', 'token']]);

        $this->assertDatabaseHas('users', [
            'phone' => $payload['phone'],
            'username' => $payload['username'],
        ]);
    }

    public function test_login_with_phone_returns_token()
    {
        // Create a user with the default password used by controller (123123123)
        $user = User::create([
            'username' => 'Login User',
            'region' => 'Some Region',
            'phone' => '0599999999',
            'password' => bcrypt('123123123'),
        ]);

        $response = $this->postJson('/api/login', [
            'phone' => $user->phone,
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => ['user', 'token']]);
    }
}
