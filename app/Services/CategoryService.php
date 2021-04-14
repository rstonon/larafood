<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class CategoryService

{
    protected $categoryRepository, $tenantRepository;

    public function __construct(
        TenantRepositoryInterface $tenantRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function getCategoriesByUuid(string $uuid)
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        $category = $this->categoryRepository->getCategoriesByTenantId($tenant->id);

        return $category;
    }

    public function getCategoryByUuid(string $url)
    {
        return $this->categoryRepository->getCategoryByUuid($url);
    }
}
