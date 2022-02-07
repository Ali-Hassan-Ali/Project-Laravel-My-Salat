<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\OWner\Auth\AuthController;

use App\Http\Controllers\Dashboard\Owner\WelcomeController;
// use App\Http\Controllers\Dashboard\ownerController;


Route::get('dashboard/owner/login', [AuthController::class,'index'])->name('dashboard.owner.login');
Route::post('/dashboard/owner/store', [AuthController::class,'store'])->name('dashboard.owner.login.store');
Route::get('dashboard/owner/logout', [AuthController::class,'owner_logout'])->name('dashboard.owner.logout');

Route::prefix('dashboard/owner')->name('dashboard.owner.')->middleware('auth:owner')->group(function () {

        Route::get('/', [WelcomeController::class,'index'])->name('welcome');

        // Route::resource('owners', ownerController::class)->except('show');

});//group(function