<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Order;

trait TraitFirebase {

	
   	public function Send(Request $request, Order $order)
    {
	    $data = '{
			 "to" :"'.$order->token.'",
			 "notification" : {
			     "body" : "تم الحجز بنجاح يمكنك الدفع الآن",  "title":"تأكيد الحجز"},
			 
			"data": {
			    "click_action": "FLUTTER_NOTIFICATION_CLICK",
			    "order_id":"'.$order->id.'",
			    "hall_name":"'.$order->banner->name.'",
			    "cost":"'.$order->id.'",
			    "image":[
				    "'.$order->banner->image_path.'",
				    "'.$order->banner->image_path.'",
			    ],
			     "payment_way":[ {
			        "AccountNumber":"'.$order->payment_client->first()->number_acount.'",
			        "AcountName":"'.$order->payment_client->first()->name_acount.'",
			        "name": "'.$order->payment_client->first()->name_acount.'"},

			     {
			        "AccountNumber":"'.$order->payment_client->first()->number_acount.'",
			        "AcountName":"'.$order->payment_client->first()->name_acount.'", 
			        "name": "'.$order->payment_client->first()->name_acount.'"}
				]}
			}';

		    $response = Http::withHeaders([
		        'Authorization'  => env("AUTHORIZATION_KEY"),
		        'Content-Type'   => 'application/json',
		    ])->withBody($data, 'application/json')
		      ->post('https://fcm.googleapis.com/fcm/send');


    }//end of fun

}//end of Trait