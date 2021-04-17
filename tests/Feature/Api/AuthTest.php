<?php

namespace Tests\Feature\Api;

use App\Models\Client;
use Illuminate\Support\Str;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * Test Auth Error.
     *
     * @return void
     */
    public function testAuthError()
    {
        $response = $this->postJson('/api/auth/token');

        $response->assertStatus(422);
    }

    /**
     * Test Auth with Client Fake.
     *
     * @return void
     */
    public function testAuthClientFake()
    {
        $payload = [
            'email' => 'email@email.com',
            'password' => '123456',
            'device_name' => Str::random(10),
        ];

        $response = $this->postJson('/api/auth/token', $payload);

        $response->assertStatus(404)
                    ->assertExactJson([
                      'message' => trans('messages.invalid_credentials')
                    ]);
    }

    /**
     * Test Auth Success.
     *
     * @return void
     */
    public function testAuthSuccess()
    {
        $client = Client::factory()->create();

        $payload = [
            'email' => $client->email,
            'password' => 'password',
            'device_name' => Str::random(10),
        ];

        $response = $this->postJson('/api/auth/token', $payload);

        $response->assertStatus(200)
                    ->assertJsonStructure(['token']);
    }

    /**
     * Test Auth Me Error.
     *
     * @return void
     */
    public function testAuthMeError()
    {
        $response = $this->getJson('/api/auth/me');

        $response->assertStatus(401);
    }

    /**
     * Test Auth Me.
     *
     * @return void
     */
    public function testAuthMeSuccess()
    {
        $client = Client::factory()->create();

        $token = $client->createToken(Str::random(10))->plainTextToken;

        $response = $this->getJson('/api/auth/me', [
            'Authorization' => "Bearer {$token}",
        ]);

        $response->assertStatus(200)
                    ->assertExactJson([
                        'data' => [
                            'name' => $client->name,
                            'email' => $client->email,
                        ]
                    ]);
    }

    /**
     * Test Logout.
     *
     * @return void
     */
    public function testAuthLogout()
    {
        $client = Client::factory()->create();

        $token = $client->createToken(Str::random(10))->plainTextToken;

        $response = $this->postJson('/api/auth/logout', [], [
            'Authorization' => "Bearer {$token}",
        ]);

        $response->assertStatus(204);
    }
}
