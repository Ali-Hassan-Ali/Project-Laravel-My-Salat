<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', [\App\Http\Controllers\Api\WelcomeController::class,'index']);

Route::get('/', function () {
    return 'ffffffffffffff';

});

Route::get('banners', function () {

    $banners = App\Models\Categorey::all();

    return response()->json([
        'data' => App\Http\Resources\BannerResource::collection($banners),
        'error' => 0,
        'message' => '',
    ]);

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/imei', [App\Http\Controllers\HomeController::class, 'imeiCheck'])->name('imei');
Route::post('/imei', [App\Http\Controllers\HomeController::class, 'imeiSubmit']);
// Load admin routes if present (requires Livewire and other providers to be registered first)
if (file_exists(__DIR__.'/admin.php')) {
    require __DIR__.'/admin.php';
}
