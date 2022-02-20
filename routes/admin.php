<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\Admin\Auth\AuthController;

use App\Http\Controllers\Dashboard\Admin\WelcomController;
use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\Admin\OwnerController;
use App\Http\Controllers\Dashboard\Admin\CategoreyController;
use App\Http\Controllers\Dashboard\Admin\BookingController;

use App\Http\Controllers\Dashboard\Admin\ServiceCategoryController;


Route::get('dashboard/login', [AuthController::class,'index'])->name('dashboard.admin.login');
Route::post('/dashboard/store', [AuthController::class,'store'])->name('dashboard.admin.login.store');
Route::get('dashboard/admin/logout', [AuthController::class,'admin_logout'])->name('dashboard.admin.logout');

Route::prefix('dashboard/admin')->name('dashboard.admin.')->middleware('auth:admin')->group(function () {

        Route::get('/', [WelcomController::class,'index'])->name('welcome');

        Route::resource('admins', AdminController::class)->except('show');

        Route::resource('owners', OwnerController::class)->except('show');

        Route::resource('service_categorys', ServiceCategoryController::class)->except('show');

        Route::resource('categoreys', CategoreyController::class)->except('show');

        Route::resource('bookings', BookingController::class)->except('show');

});//group(function