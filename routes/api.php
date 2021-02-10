<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('oem', 'App\Http\Controllers\ApiController@getAllOEM');
Route::get('oem/specs/', 'App\Http\Controllers\ApiController@getAllOEMSpecs');
Route::get('inventories/', 'App\Http\Controllers\ApiController@getAllInventories');
Route::post('inventory/create', 'App\Http\Controllers\ApiController@createInventory');
Route::put('inventory/update/{id}', 'App\Http\Controllers\ApiController@updateInventory');
Route::delete('inventory/delete/{id}','App\Http\Controllers\ApiController@deleteInventory');
