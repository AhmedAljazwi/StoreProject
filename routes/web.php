<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerUser']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'check']);

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
Route::get('/admin/delete-product/{id}', [AdminController::class, 'deleteProduct']);

Route::get('/admin/inventories', [AdminController::class, 'inventory']);
Route::get('/admin/create-inventory', [AdminController::class, 'createInventory']);
Route::post('/admin/store-inventory', [AdminController::class, 'storeInventory']);
Route::get('/admin/edit-inventory/{id}', [AdminController::class, 'editInventory']);
Route::put('/admin/update-inventory/{id}', [AdminController::class, 'updateInventory']);
Route::get('/admin/delete-inventory/{id}', [AdminController::class, 'deleteInventory']);

/////USER ROUTES/////
Route::get('/user/cart', [UserController::class, 'cart']);
Route::get('/user/add-cart/{id}', [UserController::class, 'addCart']);
Route::post('/user/update-cart/{id}', [UserController::class, 'updateCart']);