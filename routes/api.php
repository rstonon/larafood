<?php

use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\{
    CategoryApiController,
    OrderApiController,
    ProductApiController,
    TableApiController,
    TenantApiController
};
use App\Http\Controllers\Api\Auth\AuthClientController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/sanctum/token', [AuthClientController::class, 'auth']);

Route::group([
    'middleware' => ['auth:sanctum']
], function() {
    Route::get('/auth/me', [AuthClientController::class, 'me']);
    Route::post('/auth/logout', [AuthClientController::class, 'logout']);
});


Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function () {

Route::get('/tenants/{uuid}', [TenantApiController::class, 'show']);
Route::get('/tenants', [TenantApiController::class, 'index']);

Route::get('/categories/{identify}', [CategoryApiController::class, 'show']);
Route::get('/categories', [CategoryApiController::class, 'categoriesByTenant']);

Route::get('/tables/{identify}', [TableApiController::class, 'show']);
Route::get('/tables', [TableApiController::class, 'tablesByTenant']);

Route::get('/products/{identify}', [ProductApiController::class, 'show']);
Route::get('/products', [ProductApiController::class, 'productsByTenant']);

Route::post('/client', [RegisterController::class, 'store']);

Route::post('/orders', [OrderApiController::class, 'store']);
Route::get('/orders/{identify}', [OrderApiController::class, 'show']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

});
