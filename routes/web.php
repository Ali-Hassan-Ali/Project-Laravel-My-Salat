<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    
    return 'welcome'; 
    return auth()->guard('admin')->logout();
    return auth()->guard('admin')->user()->name;
    return view('welcome');
    return view('dashboard_admin.layout.master');
    
})->name('aaa');

// Route::get('/login', function () {
//     return view('dashboard_admin.auth.login');
// });

Auth::routes();;
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
