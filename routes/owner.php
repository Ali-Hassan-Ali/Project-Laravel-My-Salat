<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\OWner\Auth\AuthController;
use App\Http\Controllers\Dashboard\OWner\Auth\RegisterController;

use App\Http\Controllers\Dashboard\Owner\WelcomeController;
use App\Http\Controllers\Dashboard\Owner\StaticController;
use App\Http\Controllers\Dashboard\Owner\BannerController;
use App\Http\Controllers\Dashboard\Owner\GalleryController;
use App\Http\Controllers\Dashboard\Owner\PackageController;


Route::get('dashboard/owner/login', [AuthController::class,'index'])->name('dashboard.owner.login');
Route::post('/dashboard/owner/store', [AuthController::class,'store'])->name('dashboard.owner.login.store');

Route::get('dashboard/owner/register', [RegisterController::class,'index'])->name('dashboard.owner.register');
Route::post('/dashboard/owner/register/store', [RegisterController::class,'store'])->name('dashboard.owner.register.store');

Route::get('dashboard/owner/logout', [AuthController::class,'owner_logout'])->name('dashboard.owner.logout');

Route::prefix('dashboard/owner')->name('dashboard.owner.')->middleware('auth:owner')->group(function () {

        Route::get('/', [WelcomeController::class,'index'])->name('welcome');

        Route::get('calendar', [StaticController::class,'calendar'])->name('calendar');

        Route::resource('banners', BannerController::class)->except('show');

        Route::resource('gallerys', GalleryController::class)->except('show');

        Route::resource('packages', PackageController::class)->except('show');

});//group(function