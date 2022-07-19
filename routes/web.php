<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;


// Route::get('/', [\App\Http\Controllers\Api\WelcomeController::class,'index']);

Route::get('/', function () {

    dd(\Request::header('fsf'));

    return \App\Models\Banner::first();

    $myarray = [
            ['name'=> 'one', 'email' => 'one@gmail.com'],
            ['name'=> 'two', 'email' => 'two@gmail.com'],
            ['name'=> 'three', 'email' => 'three@gmail.com'],
        ];  
        foreach ($myarray as $key => $value) {
            return $id[] = \DB::table('users')->insertGetId(
                ['email' => $value['email'],'name' => $value['name']]
            );
        }

    $data = [
        [
            'name' => ' متحركه',
            'categories_id'   => '1',
            'number'   => '3',//count banner favored
        ],

        [
            'name' => 'صلات متحركه',
            'categories_id'   => '2',
            'number'   => '3',//count banner favored
        ],
    ];

    return response()->json($data);
    return;
    return \App\Models\Banner::first();
    $response = Http::firebase()->post('/')->throw('{
 
 "to" :"esSIQrVDRBaqzgl-XJYvex:APA91bF_lLJXclR_m3mxiif2aZho6jPUbSN_Oqwg2zL12U_XRvbOcv9r8-YQRD38mftPCCjAm0B9DDyzGPzWDNYYU-fF8512agDtPLYoyxjmyAxWg9IG6e1D4fy439znZXbdIClyEDPe",
 "notification" : {
     "body" : "تم الحجز بنجاح يمكنك الدفع الآن",  "title":"تأكيد الحجز"},
 
"data": {
    "click_action": "FLUTTER_NOTIFICATION_CLICK",
    "order_id":"3",
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
}');
    return $response->failed();
    return env("AUTHORIZATION_KEY");
    return now()->toTimeString();  
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

Route::get('/imei', [App\Http\Controllers\HomeController::class, 'imeiCheck'])->name('imei');
Route::post('/imei', [App\Http\Controllers\HomeController::class, 'imeiSubmit']);