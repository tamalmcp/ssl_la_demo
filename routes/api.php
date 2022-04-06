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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home/users', [App\Http\Controllers\HomeController::class, 'index'])->name('home/users');
Route::get('/home/user-detail/{id}', [App\Http\Controllers\HomeController::class, 'view']);
Route::get('/home/products', [App\Http\Controllers\HomeController::class, 'products']);
Route::post('/home/product_create', [App\Http\Controllers\HomeController::class, 'product_create']);
Route::delete('/home/delete_product/{id}', [App\Http\Controllers\HomeController::class, 'delete_product']);
