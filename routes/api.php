<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainCategoryController;
use App\Http\Controllers\Api\OwnerController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\SettingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/test', function () {
    
    return App\Models\User::all();
    return $request->all();

});

Route::get('min_category', [MainCategoryController::class,'index']);

Route::get('owner/{id}', [OwnerController::class,'index']);

Route::get('banners/{id}', [BannerController::class,'index']);

Route::post('order/store', [OrderController::class,'store']);
Route::get('order/show/{order}', [OrderController::class,'show'])->name('order.show');
Route::get('order/user/{id}', [OrderController::class,'show_all_order']);
Route::post('order/payment', [OrderController::class,'payment_order']);

Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);
Route::post('/user_update', [AuthController::class,'update_user']);
    
Route::post('/settings/support', [SettingController::class,'support']);

Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('/show_order', [OrderController::class,'show_order']);
    Route::get('/user', [AuthController::class,'user']);
    Route::post('/user/update', [AuthController::class,'update']);
    
});