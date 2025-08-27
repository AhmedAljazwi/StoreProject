<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/admin/home', [AdminController::class, 'home']);

Route::get('/admin/categories', [AdminController::class, 'categories']);
Route::get('/admin/create-category', [AdminController::class, 'create']);
Route::post('/admin/store-catgeory', [AdminController::class, 'store']);
Route::get('/admin/edit-category/{id}', [AdminController::class, 'edit']);
Route::put('/admin/update-category/{id}', [AdminController::class, 'update']);
Route::get('/admin/delete-category/{id}', [AdminController::class, 'delete']);

Route::get('/admin/products', [AdminController::class, 'products']);
Route::get('/admin/create-product', [AdminController::class, 'createProduct']);
Route::post('/admin/store-product', [AdminController::class, 'storeProduct']);
Route::get('/admin/edit-product/{id}', [AdminController::class, 'editProduct']);
Route::put('/admin/update-product/{id}', [AdminController::class, 'updateProduct']);