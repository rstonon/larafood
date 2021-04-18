<?php
Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function () {
    Route::get('/myorders', 'Auth\OrderTenantController@index')->middleware(['auth']);
    Route::patch('/myorders', 'Auth\OrderTenantController@update')->middleware(['auth']);
});
