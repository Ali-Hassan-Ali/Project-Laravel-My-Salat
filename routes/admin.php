<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\Admin\Auth\AuthController;

use App\Http\Controllers\Dashboard\Admin\WelcomController;
use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\Admin\OwnerController;
use App\Http\Controllers\Dashboard\Admin\UserController;
use App\Http\Controllers\Dashboard\Admin\CategoreyController;
use App\Http\Controllers\Dashboard\Admin\BookingController;
use App\Http\Controllers\Dashboard\Admin\ServiceCategoryController;
use App\Http\Controllers\Dashboard\Admin\PaymentAdminController;
use App\Http\Controllers\Dashboard\Admin\SettingController;
use App\Http\Controllers\Dashboard\Admin\ProductCategoryController;
use App\Http\Controllers\Dashboard\Admin\ProductController;
use App\Http\Controllers\Dashboard\Admin\OrderController;
use App\Http\Controllers\Dashboard\Admin\OrderStatusController;
use App\Http\Controllers\Dashboard\Admin\SupportController;


Route::get('dashboard/admin/login', [AuthController::class,'index'])->name('dashboard.admin.login');
Route::post('/dashboard/admin/store', [AuthController::class,'store'])->name('dashboard.admin.login.store');
Route::get('dashboard/admin/logout', [AuthController::class,'admin_logout'])->name('dashboard.admin.logout');

Route::prefix('dashboard/admin')->name('dashboard.admin.')->middleware('auth:admin')->group(function () {

        Route::get('/home', [WelcomController::class,'index'])->name('home');

        Route::get('admins/data', [OwnerController::class, 'data'])->name('admins.data');
        Route::resource('admins', AdminController::class)->except('show');

        Route::get('owners/data', [OwnerController::class, 'data'])->name('owners.data');
        Route::resource('owners', OwnerController::class)->except('show');

        Route::get('users/data', [OwnerController::class, 'data'])->name('users.data');
        Route::resource('users', UserController::class)->except('show');

        Route::resource('service_categorys', ServiceCategoryController::class)->except('show');

        Route::resource('categoreys', CategoreyController::class)->except('show');

        Route::resource('bookings', BookingController::class)->except('show');

        Route::resource('payment_admins', PaymentAdminController::class)->except('show');

        Route::resource('product_categorys', ProductCategoryController::class)->except('show');
        
        Route::resource('products', ProductController::class)->except('show');

        Route::resource('orders', OrderController::class)->except('show');
        // Route::resource('orders.order_status', OrderStatusController::class)->except('show');

        Route::prefix('setting')->name('setting.')->group(function () {

                Route::resource('suppors', SupportController::class)->except('show');

                Route::get('support', [SettingController::class, 'support'])->name('support');
                Route::post('/settings', [SettingController::class,'store'])->name('store');

        });//group(function

});//group(function