<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\Owner\Auth\AuthController;
use App\Http\Controllers\Dashboard\Owner\Auth\RegisterController;

use App\Http\Controllers\Dashboard\Owner\WelcomeController;
use App\Http\Controllers\Dashboard\Owner\StaticController;
use App\Http\Controllers\Dashboard\Owner\BannerController;
use App\Http\Controllers\Dashboard\Owner\GalleryController;
use App\Http\Controllers\Dashboard\Owner\PackageController;
use App\Http\Controllers\Dashboard\Owner\ServiceController;
use App\Http\Controllers\Dashboard\Owner\PaymentClientController;


Route::get('dashboard/owner/login', [AuthController::class,'index'])->name('dashboard.owner.login');
Route::post('/dashboard/owner/store', [AuthController::class,'store'])->name('dashboard.owner.login.store');

Route::get('dashboard/owner/register', [RegisterController::class,'index'])->name('dashboard.owner.register');
Route::post('/dashboard/owner/register/store', [RegisterController::class,'store'])->name('dashboard.owner.register.store');

Route::get('dashboard/owner/logout', [AuthController::class,'owner_logout'])->name('dashboard.owner.logout');

Route::prefix('dashboard/owner')->name('dashboard.owner.')->middleware('auth:owner')->group(function () {

        Route::get('/', [WelcomeController::class,'index'])->name('welcome');

        Route::post('/create_new_order', [WelcomeController::class,'create_new_order'])->name('create.new.order');

        Route::get('calendar', [StaticController::class,'calendar'])->name('calendar');

        Route::resource('banners', BannerController::class)->except('show');

        Route::resource('gallerys', GalleryController::class)->except('show');

        Route::resource('packages', PackageController::class)->except('show');

        Route::resource('services', ServiceController::class)->except('show');
        
        Route::resource('payment_clients', PaymentClientController::class)->except('show');

});//group(function