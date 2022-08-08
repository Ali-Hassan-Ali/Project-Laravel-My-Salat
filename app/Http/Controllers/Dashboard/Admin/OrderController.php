<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Traits\TraitFirebase;

class OrderController extends Controller
{
    use TraitFirebase;

    public function index()
    {
        $orders = Order::latest()->get();

        // return $orders;

        return view('dashboard_admin.orders.index', compact('orders'));

    }//end of index


    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $orderStatus = OrderStatus::all();

        return view('dashboard_admin.orders.edit', compact('order', 'orderStatus'));

    }//end of edit

    
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'order_statuses_id' => ['required','numeric'],
        ]);

        if ($request->order_statuses_id == '1') {

            $this->Send($request, $order);
            
        }//end of if

        $order->update(['order_statuses_id' => $request->order_statuses_id]);

        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->route('dashboard.admin.orders.index');


    }//end of update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
