<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/admin/home', [AdminController::class, 'home']);
Route::get('/admin/categories', [AdminController::class, 'categories']);
Route::get('/admin/create-category', [AdminController::class, 'create']);
Route::post('/admin/store-catgeory', [AdminController::class, 'store']);