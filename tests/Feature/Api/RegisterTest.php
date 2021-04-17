<?php

namespace Tests\Feature\Api;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * Error Register Client
     *
     * @return void
     */
    public function testRegisterClientError()
    {
        $payload = [
            'name' => 'Rafael Tonon',
            'email' => 'rstonon@gmail.com',
        ];

        $response = $this->postJson('/api/auth/register', $payload);

        $response->assertStatus(422);
//                    ->assertExactJson([
//                        'message' => 'The given data was invalid.',
//                        'errors' => [
//                            'password' => [
//                                trans('validation.required', ['attribute' => 'password'])
//                            ]
//                        ]
//                    ]);
    }

    /**
     * Success Register Client
     *
     * @return void
     */
    public function testRegisterClientSuccess()
    {
        $payload = [
            'name' => 'Rafael Tonon',
            'email' => 'rstonon@gmail.com',
            'password' => '123456',
        ];

        $response = $this->postJson('/api/auth/register', $payload);

        $response->assertStatus(201)
                    ->assertExactJson([
                        'data' => [
                            'name' => $payload['name'],
                            'email' => $payload['email'],
                        ]
                    ]);
    }
}
