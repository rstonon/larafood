<?php

use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\{CategoryApiController,
    EvaluationApiController,
    OrderApiController,
    ProductApiController,
    TableApiController,
    TenantApiController};
use App\Http\Controllers\Api\Auth\AuthClientController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/auth/register', [RegisterController::class, 'store']);
Route::post('/auth/token', [AuthClientController::class, 'auth']);

Route::group([
    'middleware' => ['auth:sanctum']
], function() {
    Route::get('/auth/me', [AuthClientController::class, 'me']);
    Route::post('/auth/logout', [AuthClientController::class, 'logout']);

    Route::post('/auth/v1/orders/{identifyOrder}/evaluations', [EvaluationApiController::class, 'store']);

    Route::get('/auth/v1/myorders', [OrderApiController::class, 'myOrders']);
    Route::post('/auth/v1/orders', [OrderApiController::class, 'store']);
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

Route::post('/orders', [OrderApiController::class, 'store']);
Route::get('/orders/{identify}', [OrderApiController::class, 'show']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

});
