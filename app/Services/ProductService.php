<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class ProductService

{
    protected $productRepository, $tenantRepository;

    public function __construct(
        TenantRepositoryInterface $tenantRepository,
        ProductRepositoryInterface $productRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function getProductsByTenantUuid(string $uuid, array $categories)
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        $product = $this->productRepository->getProductsByTenantId($tenant->id, $categories);

        return $product;
    }

    public function getProductByUuid(string $uuid)
    {
        $product = $this->productRepository->getProductByUuid($uuid);

        return $product;
    }
}
