<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Http\Controllers\Controller;
use App\Models\PaymentAdmin;
use App\Models\PaymentClient;
use Illuminate\Http\Request;

class PaymentClientController extends Controller
{

    public function index()
    {
        $payment_clients = PaymentClient::where('banner_id', auth()->guard('owner')->user()->banner->id)->get();

        return view('dashboard_owner.payment_clients.index', compact('payment_clients'));

    }//endof index

    
    public function create()
    {
        $payment_admins = PaymentAdmin::all();

        return view('dashboard_owner.payment_clients.create', compact('payment_admins'));

    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'number_acount'     => ['required','numeric'],
            'name_acount'       => ['required'],
            'note'              => ['required'],
            'payment_admins_id' => ['required','numeric'],
        ]);

        try {

            $request['banner_id'] = auth()->guard('owner')->user()->banner->id;

            PaymentClient::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.owner.payment_clients.index');
            
        } catch (\Exception $e) {
            
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//try

    }//end of store


    public function edit(PaymentClient $paymentClient)
    {
        $payment_admins = PaymentAdmin::all();

        return view('dashboard_owner.payment_clients.edit', compact('paymentClient','payment_admins'));

    }//end of edit

    
    public function update(Request $request, PaymentClient $paymentClient)
    {
        $request->validate([
            'number_acount'     => ['required','numeric'],
            'name_acount'       => ['required'],
            'note'              => ['required'],
            'payment_admins_id' => ['required','numeric'],
        ]);

        try {

            $request['banner_id'] = auth()->guard('owner')->user()->banner->id;

            $paymentClient->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.owner.payment_clients.index');
            
        } catch (\Exception $e) {
            
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//try

    }//end of update


    public function destroy(PaymentClient $paymentClient)
    {
        try {

            $paymentClient->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.admin.payment_clients.index');
            
        } catch (\Exception $e) {
            
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end of try

    }//end of destroy

}//end of controller
