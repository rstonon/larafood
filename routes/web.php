<?php

use App\Http\Controllers\Admin\{
    CategoryController,
    CategoryProductController,
    DetailPlanController,
    PlanController,
    ProductController,
    UserController
};
use App\Http\Controllers\Admin\ACL\{
    ModuleController,
    PermissionController,
    PermissionModuleController,
    PlanModuleController,
};
use App\Http\Controllers\Site\SiteController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')
            ->middleware('auth')
            ->group(function () {

    // Route Products x Categories
    Route::get('products/{idProduct}/category/{idCategory}/detach', [CategoryProductController::class, 'detachCategoriesProduct'])->name('products.category.detach');
    Route::post('products/{idProduct}/categories/store', [CategoryProductController::class, 'attachCategoriesProduct'])->name('products.categories.attach');
    Route::any('products/{idProduct}/categories/create', [CategoryProductController::class, 'categoriesAvailable'])->name('products.categories.available');
    Route::get('products/{idProduct}/categories', [CategoryProductController::class, 'categories'])->name('products.categories');
    Route::get('categories/{idCategory}/products', [CategoryProductController::class, 'products'])->name('categories.products');

    // Route Products
    Route::any('products/search', [ProductController::class, 'search'])->name('products.search');
    Route::resource('products', ProductController::class);

    // Route Categories
    Route::any('categories/search', [CategoryController::class, 'search'])->name('categories.search');
    Route::resource('categories', CategoryController::class);

    // Route Users
    Route::any('users/search', [UserController::class, 'search'])->name('users.search');
    Route::resource('users', UserController::class);

    // Route Plans x Modules
    Route::get('plans/{idPlan}/module/{idModule}/detach', [PlanModuleController::class, 'detachModulesPlan'])->name('plans.module.detach');
    Route::post('plans/{idPlan}/modules/store', [PlanModuleController::class, 'attachModulesPlan'])->name('plans.modules.attach');
    Route::any('plans/{idPlan}/modules/create', [PlanModuleController::class, 'modulesAvailable'])->name('plans.modules.available');
    Route::get('plans/{idPlan}/modules', [PlanModuleController::class, 'modules'])->name('plans.modules');
    Route::get('modules/{idModule}/plans', [PlanModuleController::class, 'plans'])->name('modules.plans');

    // Route Permissions x Modules
    Route::get('modules/{idModule}/permission/{idPermission}/detach', [PermissionModuleController::class, 'detachPermissionsModule'])->name('modules.permissions.detach');
    Route::post('modules/{idModule}/permissions/store', [PermissionModuleController::class, 'attachPermissionsModule'])->name('modules.permissions.attach');
    Route::any('modules/{idModule}/permissions/create', [PermissionModuleController::class, 'permissionsAvailable'])->name('modules.permissions.available');
    Route::get('modules/{idModule}/permissions', [PermissionModuleController::class, 'permissions'])->name('modules.permissions');
    Route::get('permissions/{idPermission}/modules', [PermissionModuleController::class, 'modules'])->name('permissions.modules');

    // Route Permissions
    Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
    Route::resource('permissions', PermissionController::class);

    // Route Modules
    Route::any('modules/search', [ModuleController::class, 'search'])->name('modules.search');
    Route::resource('modules', ModuleController::class);

    // Route Details Plans
    Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
    Route::delete('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'destroy'])->name('details.plan.destroy');
    Route::get('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'show'])->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'update'])->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('details.plan.edit');

    Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');
    Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');


    // Routes Plans
    Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');
    Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('plans', [PlanController::class, 'index'])->name('plans.index');


    // Home Dashboard
    Route::get('/', [PlanController::class, 'index'])->name('admin.index');
});


//Site
Route::get('/plan/{url}', [SiteController::class, 'plan'])->name('plan.subscription');
Route::get('/', [SiteController::class, 'index'])->name('site.home');


//Authentication
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
