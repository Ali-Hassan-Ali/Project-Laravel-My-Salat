<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\PaymentAdmin;
use Illuminate\Http\Request;

class PaymentAdminController extends Controller
{

    public function index()
    {
        $payment_admins = PaymentAdmin::all();

        return view('dashboard_admin.payment_admins.index', compact('payment_admins'));

    }//end of index

    
    public function create()
    {
        return view('dashboard_admin.payment_admins.create');

    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'name'  => ['required'],
            'image' => ['required','image'],
        ]);

        try {
            
            $request_data          = $request->except('image');
            $request_data['image'] = $request->file('image')->store('payment_images','public');

            PaymentAdmin::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.admin.payment_admins.index');

        } catch (\Exception $e) {
            
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//try

    }//end of store

    
    public function edit(PaymentAdmin $paymentAdmin)
    {
        return view('dashboard_admin.payment_admins.edit', compact('paymentAdmin'));

    }//end of edit


    public function update(Request $request, PaymentAdmin $paymentAdmin)
    {
        $request->validate([
            'name'  => ['required'],
        ]);

        try {
            
            $request_data = $request->except('image');

            if ($request->image) {

                if ($paymentAdmin->image != 'payment_images/default.png') {

                    Storage::disk('local')->delete('public/'. $paymentAdmin->image);

                } //end of inner if
                
                $request_data['image'] = $request->file('image')->store('payment_images','public');

            }//end of if

            $paymentAdmin->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.admin.payment_admins.index');

        } catch (\Exception $e) {
            
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//try

    }//end of update

    public function destroy(PaymentAdmin $paymentAdmin)
    {
        try {

            if ($paymentAdmin->image != 'payment_images/default.png') {

                Storage::disk('local')->delete('public/'. $paymentAdmin->image);

            } //end of inner if

            $paymentAdmin->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.admin.payment_admins.index');
            
        } catch (\Exception $e) {
            
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end of try

    }//end of destroy

}//end of controller
