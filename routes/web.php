<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/', [\App\Http\Controllers\Api\WelcomeController::class,'index']);

Route::get('/', function () {
    
    return \App\Models\PaymentAdmin::all();
    
    return $banners = App\Models\Banner::all();

    $categoreys = App\Models\ServiceCategory::with('service')->get();

    return response()->api(App\Http\Resources\CategoryResource::collection($categoreys));

});

Route::get('Api/Banner', function () {

    $banners = App\Models\Banner::where('categoreys_id',1)->get();

    return response()->api(App\Http\Resources\BannerResource::collection($banners));

});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
