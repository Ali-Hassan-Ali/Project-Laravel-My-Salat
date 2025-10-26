<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', [\App\Http\Controllers\Api\WelcomeController::class,'index']);

Route::get('/', function () {
    return 'ffffffffffffff';

});

Route::get('banners', function () {

    $banners = App\Models\Categorey::all();

    return response()->api(App\Http\Resources\BannerResource::collection($banners));

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/imei', [App\Http\Controllers\HomeController::class, 'imeiCheck'])->name('imei');
Route::post('/imei', [App\Http\Controllers\HomeController::class, 'imeiSubmit']);
