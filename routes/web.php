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

    $order = Admin::whereRoleIs('admin')->first();

    dd(auth('admin')->user()->isAbleTo('admins-create'));
    // return $order;
    // $user  = User::find($order->user_id);
    // dd($orders);

    // dd($orders->payment_client->first()->name_acount);

    return view('dashboard_admin.invoice.order', compact('order', 'user'));

    // Browsershot::url('https://example.com')->save('example.pdf');

 
});


Route::get('Api/Banner', function () {

    $banners = App\Models\Banner::where('categoreys_id',1)->get();

    return response()->api(App\Http\Resources\BannerResource::collection($banners));

});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/imei', [App\Http\Controllers\HomeController::class, 'imeiCheck'])->name('imei');
Route::post('/imei', [App\Http\Controllers\HomeController::class, 'imeiSubmit']);