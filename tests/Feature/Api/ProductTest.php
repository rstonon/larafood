<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Error Get All Products By Tenant
     *
     * @return void
     */
    public function testGetAllProductsByTenantError()
    {
        $tenant = 'fake_value';

        $response = $this->getJson("/api/v1/products?token_company={$tenant}");

        $response->assertStatus(422);
    }

    /**
     * Get All Products By Tenant
     *
     * @return void
     */
    public function testGetAllProductsByTenant()
    {
        $tenant = Tenant::factory()->create();

        $response = $this->getJson("/api/v1/products?token_company={$tenant->uuid}");

        $response->assertStatus(200);
    }

    /**
     * Error Get Product By Tenant
     *
     * @return void
     */
    public function testGetProductByTenantError()
    {
        $tenant = Tenant::factory()->create();
        $identify = 'fake_value';

        $response = $this->getJson("/api/v1/products/{$identify}?token_company={$tenant->uuid}");

        $response->assertStatus(404);
    }

    /**
     * Get Product By Tenant
     *
     * @return void
     */
    public function testGetProductByTenant()
    {
        $tenant = Tenant::factory()->create();
        $identify = Product::factory()->create();

        $response = $this->getJson("/api/v1/products/{$identify->uuid}?token_company={$tenant->uuid}");

        $response->assertStatus(200);
    }
}
