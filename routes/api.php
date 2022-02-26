<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainCategoryController;
use App\Http\Controllers\Api\OwnerController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\OrderController;

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

Route::get('min_category', [MainCategoryController::class,'index']);

Route::get('owner/{id}', [OwnerController::class,'index']);

Route::get('banners/{id}', [BannerController::class,'index']);

Route::post('order/store', [OrderController::class,'store']);
Route::get('order/show/{order}', [OrderController::class,'show']);

Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);

Route::get('/user', [AuthController::class,'user']);

Route::middleware('auth:sanctum')->group(function () {
    //user route
});