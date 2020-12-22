<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    protected $role;
    protected $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;

        $this->middleware(['can:roles']);
    }

    public function permissions($idRole)
    {
        $role = $this->role->find($idRole);

        if(!$role) {
            return redirect()->back();
        }

         $permissions = $role->permissions()->paginate();

        return view('admin.pages.roles.permissions.permissions', [
             'role' => $role,
             'permissions' => $permissions,
        ]);
    }

    public function permissionsAvailable(Request $request, $idRole)
    {
        if(!$role = $this->role->find($idRole)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        // $permissions = $this->permission->paginate();
        $permissions = $role->permissionsAvailable($request->filter);

        return view('admin.pages.roles.permissions.available', [
            'role' => $role,
            'permissions' => $permissions,
            'filters' => $filters
       ]);
    }

    public function attachPermissionsRole(Request $request, $idRole)
    {
        if(!$role = $this->role->find($idRole)) {
            return redirect()->back();
        }

        if (!$request->permissions || count($request->permissions) == 0) {
            return redirect()->back()->with('warning', 'Favor selecionar ao menos uma permissão');
        }

        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles.permissions', $role->id);
    }

    public function detachPermissionsRole($idRole, $idPermission)
    {
        $role = $this->role->find($idRole);
        $permission = $this->permission->find($idPermission);

        if(!$role || !$permission) {
            return redirect()->back();
        }

        $role->permissions()->detach($permission);

        return redirect()->route('roles.permissions', $role->id);

    }

    public function roles($idPermission)
    {
        $permission = $this->permission->find($idPermission);

        if(!$permission) {
            return redirect()->back();
        }

        $roles = $permission->roles()->paginate();

        return view('admin.pages.permissions.roles.roles', [
            'permission' => $permission,
             'roles' => $roles,
        ]);
    }
}
