<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'as' => 'admin.'], function () {
  Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::resource('brands', BrandController::class);
  Route::resource('categories', CategoryController::class);
  Route::resource('products', ProductController::class);
  //profile
  Route::get('profile', [AdminProfileController::class, 'index'])->name('profile');
  Route::get('profile/edit', [AdminProfileController::class, 'edit'])->name('profile.edit');
  Route::put('profile/edit', [AdminProfileController::class, 'update'])->name('profile.update');
  Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
  Route::get('login', [AuthController::class, 'getLogin'])->name('admin.login');
  Route::post('login', [AuthController::class, 'postLogin']);
});