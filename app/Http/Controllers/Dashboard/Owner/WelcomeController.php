<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class WelcomeController extends Controller
{
    public function index()
    {
        $completed_order = Order::where('order_statuses_id', 1)->count();// completed
        $waiting_order   = Order::where('order_statuses_id', 2)->count();// waiting
        $cancel_order    = Order::where('order_statuses_id', 3)->count();// cancel

        return view('dashboard_owner.welcome', compact('completed_order','waiting_order','cancel_order'));
           
    }//end of index

    public function create_new_order(Request $request)
    {
        
        // return $request->all();

        // $request->validate([
        //     'name'        => ['required'],
        //     'deprecation' => ['required'],
        //     'history'     => ['required'],
        // ]);
        $request_data              = $request->except('service_id','quantity_service_id');
        $request_data['owners_id'] = auth()->guard('owner')->user()->id;
        $request_data['users_id']  = auth()->guard('owner')->user()->id;

        $order = Order::create($request_data);
        $order->OrderItem()->sync($request->service_id);
        return;
        return redirect()->back();

    }//end of store order

}//end of model
