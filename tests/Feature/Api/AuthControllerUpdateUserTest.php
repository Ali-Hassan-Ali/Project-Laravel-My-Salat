<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AuthControllerUpdateUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_user_changes_username_and_region()
    {
        $user = User::create([
            'username' => 'Old Name',
            'region' => 'Old Region',
            'phone' => '0555555555',
            'password' => bcrypt('123123123'),
            'image' => 'user_images/default.png',
        ]);

        $payload = [
            'id' => $user->id,
            'username' => 'New Name',
            'region' => 'New Region',
        ];

        $response = $this->postJson('/api/user_update', $payload);

        $response->assertStatus(200)
            ->assertJsonStructure(['data']);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'username' => 'New Name',
            'region' => 'New Region',
        ]);
    }

    public function test_update_user_updates_image_and_password()
    {
        Storage::fake('public');

        $user = User::create([
            'username' => 'Img User',
            'region' => 'Region',
            'phone' => '0566666666',
            'password' => bcrypt('oldpassword'),
            'image' => 'user_images/default.png',
        ]);

        $file = UploadedFile::fake()->image('avatar.jpg');

        $payload = [
            'id' => $user->id,
            'username' => 'Img Updated',
            'region' => 'Region Updated',
            'password' => 'newstrongpass',
            'image' => $file,
        ];

        $response = $this->postJson('/api/user_update', $payload);

        $response->assertStatus(200)
            ->assertJsonStructure(['data']);

        $user->refresh();

        $this->assertEquals('Img Updated', $user->username);
        $this->assertEquals('Region Updated', $user->region);
        $this->assertTrue(Hash::check('newstrongpass', $user->password));

        // Assert the file was stored in the public disk
        Storage::disk('public')->assertExists($user->image);
    }
}
