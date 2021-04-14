<?php

namespace App\Services;

use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TableService

{
    protected $tableRepository, $tenantRepository;

    public function __construct(
        TenantRepositoryInterface $tenantRepository,
        TableRepositoryInterface $tableRepository
    )
    {
        $this->tableRepository = $tableRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function getTablesByUuid(string $uuid)
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        $category = $this->tableRepository->getTablesByTenantId($tenant->id);

        return $category;
    }

    public function getTableByUuid(string $uuid)
    {
        return $this->tableRepository->getTableByUuid($uuid);
    }
}
