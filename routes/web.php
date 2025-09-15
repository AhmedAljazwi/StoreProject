<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

Route::get('/', [ProductController::class, 'index']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerUser']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'check']);

Route::middleare(AdminMiddleware::class)->get('/admin/home', [AdminController::class, 'home']);

Route::middleare(AdminMiddleware::class)->get('/admin/categories', [AdminController::class, 'categories']);
Route::middleare(AdminMiddleware::class)->get('/admin/create-category', [AdminController::class, 'create']);
Route::middleare(AdminMiddleware::class)->post('/admin/store-catgeory', [AdminController::class, 'store']);
Route::middleare(AdminMiddleware::class)->get('/admin/edit-category/{id}', [AdminController::class, 'edit']);
Route::middleare(AdminMiddleware::class)->put('/admin/update-category/{id}', [AdminController::class, 'update']);
Route::middleare(AdminMiddleware::class)->get('/admin/delete-category/{id}', [AdminController::class, 'delete']);

Route::middleare(AdminMiddleware::class)->get('/admin/products', [AdminController::class, 'products']);
Route::middleare(AdminMiddleware::class)->get('/admin/create-product', [AdminController::class, 'createProduct']);
Route::middleare(AdminMiddleware::class)->post('/admin/store-product', [AdminController::class, 'storeProduct']);
Route::middleare(AdminMiddleware::class)->get('/admin/edit-product/{id}', [AdminController::class, 'editProduct']);
Route::middleare(AdminMiddleware::class)->put('/admin/update-product/{id}', [AdminController::class, 'updateProduct']);
Route::middleare(AdminMiddleware::class)->get('/admin/delete-product/{id}', [AdminController::class, 'deleteProduct']);

Route::middleare(AdminMiddleware::class)->get('/admin/inventories', [AdminController::class, 'inventory']);
Route::middleare(AdminMiddleware::class)->get('/admin/create-inventory', [AdminController::class, 'createInventory']);
Route::middleare(AdminMiddleware::class)->post('/admin/store-inventory', [AdminController::class, 'storeInventory']);
Route::middleare(AdminMiddleware::class)->get('/admin/edit-inventory/{id}', [AdminController::class, 'editInventory']);
Route::middleare(AdminMiddleware::class)->put('/admin/update-inventory/{id}', [AdminController::class, 'updateInventory']);
Route::middleare(AdminMiddleware::class)->get('/admin/delete-inventory/{id}', [AdminController::class, 'deleteInventory']);

Route::middleware(AdminMiddleware::class)->get('/admin/orders', [AdminController::class, 'orders']);
Route::middleware(AdminMiddleware::class)->get('/admin/edit-order/{id}', [AdminController::class, 'editOrder']);
Route::middleware(AdminMiddleware::class)->put('/admin/update-order/{id}', [AdminController::class, 'updateOrder']);

/////USER ROUTES/////
Route::middleware(UserMiddleware::class)->get('/user/cart/', [UserController::class, 'cart']);
Route::middleware(UserMiddleware::class)->get('/user/add-cart/{id}', [UserController::class, 'addCart']);
Route::middleware(UserMiddleware::class)->post('/user/update-cart/{id}', [UserController::class, 'updateCart']);
Route::middleware(UserMiddleware::class)->get('/user/delete-cart/{id}', [UserController::class, 'deleteCart']);
Route::middleware(UserMiddleware::class)->get('/user/purchase/', [UserController::class, 'purchase']);
Route::middleware(UserMiddleware::class)->get('/user/orders/', [UserController::class, 'orders']);

Route::get('/logout/', [AuthController::class, 'logout']);