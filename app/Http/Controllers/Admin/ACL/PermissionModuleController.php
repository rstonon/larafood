<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionModuleController extends Controller
{
    protected $module;
    protected $permission;

    public function __construct(Module $module, Permission $permission)
    {
        $this->module = $module;
        $this->permission = $permission;

        $this->middleware(['can:modules']);
    }

    public function permissions($idModule)
    {
        $module = $this->module->find($idModule);

        if(!$module) {
            return redirect()->back();
        }

         $permissions = $module->permissions()->paginate();

        return view('admin.pages.modules.permissions.permissions', [
             'module' => $module,
             'permissions' => $permissions,
        ]);
    }

    public function permissionsAvailable(Request $request, $idModule)
    {
        if(!$module = $this->module->find($idModule)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        // $permissions = $this->permission->paginate();
        $permissions = $module->permissionsAvailable($request->filter);

        return view('admin.pages.modules.permissions.available', [
            'module' => $module,
            'permissions' => $permissions,
            'filters' => $filters
       ]);
    }

    public function attachPermissionsModule(Request $request, $idModule)
    {
        if(!$module = $this->module->find($idModule)) {
            return redirect()->back();
        }

        if (!$request->permissions || count($request->permissions) == 0) {
            return redirect()->back()->with('warning', 'Favor selecionar ao menos uma permissão');
        }

        $module->permissions()->attach($request->permissions);

        return redirect()->route('modules.permissions', $module->id);
    }

    public function detachPermissionsModule($idModule, $idPermission)
    {
        $module = $this->module->find($idModule);
        $permission = $this->permission->find($idPermission);

        if(!$module || !$permission) {
            return redirect()->back();
        }

        $module->permissions()->detach($permission);

        return redirect()->route('modules.permissions', $module->id);

    }

    public function modules($idPermission)
    {
        $permission = $this->permission->find($idPermission);

        if(!$permission) {
            return redirect()->back();
        }

        $modules = $permission->modules()->paginate();

        return view('admin.pages.permissions.modules.modules', [
            'permission' => $permission,
             'modules' => $modules,
        ]);
    }
}
