<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\Auth\AuthController;

use App\Http\Controllers\Dashboard\WelcomController;
use App\Http\Controllers\Dashboard\AdminController;


Route::get('dashboard/admin/login', [AuthController::class,'index'])->name('dashboard.admin.login');
Route::post('/dashboard/store', [AuthController::class,'store'])->name('dashboard.admin.login.store');
Route::post('/logout', [AuthController::class,'admin_logout'])->name('dashboard.admin.logout');

Route::prefix('dashboard/admin')->name('dashboard.admin.')->group(function () {

        Route::get('/', [WelcomController::class,'index'])->name('welcome');

        Route::resource('admins', AdminController::class)->except('show');

});//group(function