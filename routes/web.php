<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return auth()->guard('admin')->user()->name;
    return auth()->guard('admin')->logout();
    return view('welcome');


    return view('dashboard_admin.layout.master');
    
})->name('aaa');

// Route::get('/login', function () {
//     return view('dashboard_admin.auth.login');
// });

Auth::routes();;
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
