<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Plan;
use App\Models\Product;
use App\Models\Role;
use App\Models\Table;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $tenant = auth()->user()->tenant;

        $totalUsers = User::where('tenant_id', $tenant->id)->count();
        $totalTables = Table::count();
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalCompanies = Tenant::count();
        $totalPlans = Plan::count();
        $totalModules = Module::count();
        $totalRoles = Role::count();
        $totalPermissions = Permission::count();

        return view('admin.pages.home.home', [
            'totalUsers' => $totalUsers,
            'totalTables' => $totalTables,
            'totalCategories' => $totalCategories,
            'totalProducts' => $totalProducts,
            'totalCompanies' => $totalCompanies,
            'totalPlans' => $totalPlans,
            'totalModules' => $totalModules,
            'totalRoles' => $totalRoles,
            'totalPermissions' => $totalPermissions,

        ]);
    }
}
