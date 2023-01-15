<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/admin', [AdminController::class, 'admin']);

Route::get('/admin/categories', [AdminController::class, 'admin_categories']);

Route::prefix('/admin')->group(function () {
    Route::get('products', [AdminController::class, 'admin_products']);
    Route::get('products/create', [ProductsController::class, 'create']);
    Route::post('products', [ProductsController::class, 'store']);
    Route::get('products/{id}/edit', [ProductsController::class, 'edit']);
    Route::put('products/{id}', [ProductsController::class, 'update']);
    Route::delete('products/{id}', [ProductsController::class, 'destroy']);
});




