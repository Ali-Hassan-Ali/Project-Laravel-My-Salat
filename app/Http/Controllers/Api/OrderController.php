<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\PaymentOrder;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'groom_name'        => ['required'],
            'event_data'        => ['required'],
            'event_time'        => ['required'],
            'event_sort'        => ['required'],
            'primary_key_type'  => ['required'],
            'primary_key_number'=> ['required'],
            'note'              => ['required'],
            'token'             => ['required'],
            'order_statuses_id' => ['required'],
            'banner_id'         => ['required'],
            'user_id'           => ['required'],
        ]);

        if ($validator->fails()) {

            return response()->api([], 1, $validator->errors()->first());

        }//end of if
        
        $request_data = $request->except('services','dish','imaging_group');
        $request_data['order_statuses_id'] = 1;
        // $request_data['event_data']        = now()->toDateString();
        // $request_data['event_time']        = now()->toTimeString();

        $order = Order::create($request_data);

        if ($request->services) {

            foreach ($request->services as $key => $service) {
                
                OrderItem::create([
                    'order_id'   => $order->id,
                    'service_id' => $service,
                ]);

            }//end of each

        }//end of if services


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
        $order = Order::with('order_item','payment_order')->find($order->id);

        return response()->api($order);
        
    }//end of show

    public function payment_order(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment_name'    => ['required'],
            'payment_number'  => ['required'],
            'receipt_image'   => ['required'],
            'order_id'        => ['required'],
        ]);

        if ($validator->fails()) {

            return response()->api([], 1, $validator->errors()->first());

        }//end of if

        $order = PaymentOrder::where('order_id', $request->order_id)->first();

        if ($order) {

            return response()->api([], 1, __('owner.this_order'));

        }//end of order

        $request_data = $request->except('receipt_image');

        if ($request->receipt_image) {

            $request_data['receipt_image'] = $request->file('receipt_image')->store('receipt_image','public');
            
        }//end of noteice_image

        $PaymentOrder = PaymentOrder::create($request_data);
        
        return redirect()->route('order.show', $request->order_id);
        // return response()->api($PaymentOrder);

    }//end of payment_order

    public function show_order()
    {
        $data['user'] = new UserResource(auth()->user('sanctum'));

        $order = Order::with('order_item')->where('user_id', $data['user']->id)->get();
        
        return response()->api($order);

    }//end of show order

    public function show_all_order($id)
    {
        $order = Order::with('order_item')->where('user_id', $id)->get();

        return response()->api($order);

    }//end of order

}//end of controller
