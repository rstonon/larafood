<?php

namespace Tests\Feature\Api;

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\Models\Table;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * Test Validation Create New Order.
     *
     * @return void
     */
    public function testValidationCreateNewOrder()
    {
        $payload = [];

        $response = $this->postJson('/api/v1/orders', $payload);

        $response->assertStatus(422)
                    ->assertJsonPath('errors.token_company', [
                        trans('validation.required', ['attribute' => 'token company'])
                    ])
                    ->assertJsonPath('errors.products', [
                        trans('validation.required', ['attribute' => 'products'])
                    ]);
    }

    /**
     * Test Create New Order.
     *
     * @return void
     */
    public function testCreateNewOrder()
    {
        $tenant = Tenant::factory()->create();

        $payload = [
            'token_company' => $tenant->uuid,
            'products' => [],
        ];

        $products = Product::factory(10)->create();

        foreach ($products as $product)
        {
            array_push($payload['products'], [
                'identify' => $product->uuid,
                'qty' => 2,
            ]);
        }

        $response = $this->postJson('/api/v1/orders', $payload);

        $response->assertStatus(201);
    }

    /**
     * Test Total Order.
     *
     * @return void
     */
    public function testTotalOrder()
    {
        $tenant = Tenant::factory()->create();

        $payload = [
            'token_company' => $tenant->uuid,
            'products' => [],
        ];

        $products = Product::factory(2)->create();

        foreach ($products as $product)
        {
            array_push($payload['products'], [
                'identify' => $product->uuid,
                'qty' => 2,
            ]);
        }

        $response = $this->postJson('/api/v1/orders', $payload);

        $response->assertStatus(201)
                    ->assertJsonPath('data.total', 51.6);
    }

    /**
     * Test Order By Identify Error.
     *
     * @return void
     */
    public function testOrderByIdentifyError()
    {
        $order = 'fake_value';

        $response = $this->getJson("/api/v1/orders/{$order}");

        $response->assertStatus(404);
    }

    /**
     * Test Order By Identify.
     *
     * @return void
     */
    public function testOrderByIdentify()
    {
        $order = Order::factory()->create();

        $response = $this->getJson("/api/v1/orders/{$order->identify}");

        $response->assertStatus(200);
    }

    /**
 * Test Create New Order Authenticated.
 *
 * @return void
 */
    public function testCreateNewOrderAuthenticated()
    {
        $client = Client::factory()->create();
        $token = $client->createToken(Str::random(10))->plainTextToken;

        $tenant = Tenant::factory()->create();

        $payload = [
            'token_company' => $tenant->uuid,
            'products' => [],
        ];

        $products = Product::factory(2)->create();

        foreach ($products as $product)
        {
            array_push($payload['products'], [
                'identify' => $product->uuid,
                'qty' => 2,
            ]);
        }

        $response = $this->postJson('/api/auth/v1/orders', $payload, [
            'Authorization' => "Bearer {$token}"
        ]);

        $response->assertStatus(201);
    }

    /**
     * Test Create New Order withTable.
     *
     * @return void
     */
    public function testCreateNewOrderWithTable()
    {
        $table = Table::factory()->create();

        $tenant = Tenant::factory()->create();

        $payload = [
            'token_company' => $tenant->uuid,
            'table' => $table->uuid,
            'products' => [],
        ];

        $products = Product::factory(2)->create();

        foreach ($products as $product)
        {
            array_push($payload['products'], [
                'identify' => $product->uuid,
                'qty' => 2,
            ]);
        }

        $response = $this->postJson('/api/v1/orders', $payload);

        $response->assertStatus(201);
    }

    /**
     * Test Get My Orders.
     *
     * @return void
     */
    public function testGetMyOrders()
    {
        $client = Client::factory()->create();
        $token = $client->createToken(Str::random(10))->plainTextToken;

        Order::factory(3)->create([
            'client_id' => $client->id,
        ]);

        $response = $this->getJson('/api/auth/v1/myorders', [
            'Authorization' => "Bearer {$token}"
        ]);

        $response->assertStatus(200)->assertJsonCount(3, 'data');
    }
}
