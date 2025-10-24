<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
// use Spatie\Browsershot\Browsershot;
use App\Models\Order;
use App\Models\PaymentOrder;
use App\Models\User;
use App\Models\Admin;

// Route::get('/', [\App\Http\Controllers\Api\WelcomeController::class,'index']);

Route::get('/', function () {
    return 'ffffffffffffff';
 
});


Route::get('Api/Banner', function () {

    return $banners = App\Models\Categorey::all();

    return response()->api(App\Http\Resources\BannerResource::collection($banners));

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/imei', [App\Http\Controllers\HomeController::class, 'imeiCheck'])->name('imei');
Route::post('/imei', [App\Http\Controllers\HomeController::class, 'imeiSubmit']);