<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait
{
    public function permissions(): array
    {
        $permissionsPlan = $this->permissionsPlan();
        $permissionsRole = $this->permissionsRole();

        $permissions = [];
        foreach ($permissionsRole as $permission) {
            if (in_array($permission, $permissionsPlan)) {
                array_push($permissions, $permission);
            }
        }

        return $permissions;
    }

    public function permissionsPlan(): array
    {
        // $tenant = $this->tenant()->first();
        // $plan = $tenant->plan;

        $tenant = Tenant::with('plan.modules.permissions')->where('id', $this->tenant_id)->first();

        $plan = $tenant->plan;

        $permissions = [];
        foreach ($plan->modules as $module) {
            foreach ($module->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
    }

    public function permissionsRole(): array
    {
        $roles = $this->roles()->with('permissions')->get();

        $permissions = [];
        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
    }

    public function hasPermission(String $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }

    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }

    public function isTenant(): bool
    {
        return !in_array($this->email, config('acl.admins'));
    }
}
