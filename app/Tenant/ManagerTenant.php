<?php

namespace App\Tenant;

use phpDocumentor\Reflection\Types\Boolean;

class ManagerTenant
{
    public function getTenantIdentify()
    {
        return auth()->check() ? auth()->user()->tenant_id : '';
    }

    public function getTenant()
    {
        return auth()->check() ? auth()->user()->tenant : '';
    }

    public function isAdmin(): Boolean
    {
        return in_array(auth()->user()->email, config('tenant.admins'));
    }
}
