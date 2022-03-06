<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

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
        $request_data              = $request->except('service_id','quantity_service_id','packages_id');
        // return $request_data;
        $request_data['banner_id'] = auth()->guard('owner')->user()->id;
        $request_data['user_id']  = auth()->guard('owner')->user()->id;

        $order = Order::create($request_data);

        if ($request->service_id) {

            foreach ($request->service_id as $key => $data) {

                OrderItem::create([
                    'order_id'   => $order->id,
                    'service_id' => $data,
                ]);
                
            }//end of each
            
        }
        
        session()->flash('success', __('dashboard.added_successfully'));

        return redirect()->back();  

    }//end of store order

}//end of model
