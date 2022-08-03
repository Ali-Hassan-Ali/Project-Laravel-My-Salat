<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;


// Route::get('/', [\App\Http\Controllers\Api\WelcomeController::class,'index']);

Route::get('/', function () {

    $data = '{
 
 "to" :"cI5N-ExuTGStEagMOkB9Zp:APA91bFpbLE2-X7T8rIJizhScAl9xB1B-7HcF2iWVfOqnLDE9bTPKMqXPbkQQCNEuTNzXxTKeyay88aVZ1XiRx5duSGcpSp9rsLTc46qUvAYFakw7Xj-B5IWkgl8cudl20zUQJZKg0K3",
 "notification" : {
     "body" : "تم الحجز بنجاح يمكنك الدفع الآن",  "title":"تأكيد الحجز"},
 
"data": {
    "click_action": "FLUTTER_NOTIFICATION_CLICK",
    "order_id":"15",
    "hall_name":"سبارك سيتي",
    "cost":"1245",
    "image":["https://egymerch.com//mysalat//storage//gallery_images//default.png","https://egymerch.com//mysalat//storage//gallery_images//default.png"],
     "payment_way":[ {
        "AccountNumber":"123564875",
        "AcountName":"Ali",
        "name": "بنك فيصل الاسلامي"},

     {
        "AccountNumber":"123564875",
        "AcountName":"Ali", "name": "بنك فيصل الاسلامي"}

]}
}';

    $response = Http::withHeaders([
        'Authorization'  => env("AUTHORIZATION_KEY"),
        'Content-Type'   => 'application/json',
    ])->withBody($data, 'application/json')
      ->post('https://fcm.googleapis.com/fcm/send');


    return $response;
});


Route::get('Api/Banner', function () {

    $banners = App\Models\Banner::where('categoreys_id',1)->get();

    return response()->api(App\Http\Resources\BannerResource::collection($banners));

});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/imei', [App\Http\Controllers\HomeController::class, 'imeiCheck'])->name('imei');
Route::post('/imei', [App\Http\Controllers\HomeController::class, 'imeiSubmit']);