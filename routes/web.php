<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    
    return now()->toTimeString();
    
})->name('test');

// Route::get('/login', function () {
//     return view('dashboard_admin.auth.login');
// });

Auth::routes();;
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
