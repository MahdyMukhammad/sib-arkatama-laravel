<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
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

// LANDING
Route::get('/', [LandingController::class, 'index'])->name('landing');

// LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// REGISTER
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// PRODUCTS SHOW
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show')->where('id', '[0-9]+');

// AUTHENTICATE
Route::middleware('auth')->group(function () {
    // LOGOUT
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ADMIN
    Route::middleware('role:admin')->group(function () {
        //SLIDER
        Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
        Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
        Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');
        Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::put('/slider/{id}', [SliderController::class, 'update'])->name('slider.update');
        Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    });

    // ADMIN + STAFF
    Route::middleware('role:admin|staff')->group(function () {
        //CATEGORY
        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    // ADMIN + STAFF + USER
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');

    Route::middleware('role:admin|staff')->group(function () {
        // PRODUCT
        Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product', [ProductController::class, 'store'])->name('product.store');
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    });

    // ADMIN
    Route::middleware('role:admin')->group(function () {
        // ROLE
        Route::get('/role', [RoleController::class, 'index'])->name('role.index');
        Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('/role', [RoleController::class, 'store'])->name('role.store');
        Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::put('/role/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

        // USER
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
});
