<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // return $request->all();

        $validator = Validator::make($request->all(), [
            'name'        => ['required'],
            'description' => ['required'],
            'banner_id'   => ['required'],
            'user_id'     => ['required'],
            'services'    => ['required','array'],
        ]);

        if ($validator->fails()) {
            return response()->api([], 1, $validator->errors()->first());
        }
        
        $request_data = $request->except('services','dish','imaging_group');
        // $request_data['order_statuses_id'] = 1;

        $order = Order::create($request_data);

        foreach ($request->services as $key => $service) {
            
            OrderItem::create([
                'order_id'   => $order->id,
                'service_id' => $service,
            ]);

        }//end of each

        if ($request->imaging_group) {

            foreach ($request->imaging_group as $key => $data) {

                OrderItem::create([
                    'order_id'   => $order->id,
                    'service_id' => $data,
                ]);

            }//end of each

        }//end of dish

        if ($request->dish) {
            
            OrderItem::create([
                'order_id'   => $order->id,
                'service_id' => $request->dish['id'],
                'quantity'   => $request->dish['quantity'],
            ]);

        }//end of dish
        
        $order = Order::with('order_item')->find($order->id);

        return response()->api($order);

    }//en dof fun store\

    public function show(Order $order)
    {
        $order = Order::with('order_item')->find($order->id);

        return response()->api($order);
        
    }//end of show

}//end of controller
