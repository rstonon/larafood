<?php

namespace App\Models\Traits;


trait UserACLTrait
{
    public function permissions()
    {
        $tenant = $this->tenant()->first();
        $plan = $tenant->plan;

        $permissions = [];
        foreach ($plan->modules as $module) {
            foreach ($module->permissions as $permission) {
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
