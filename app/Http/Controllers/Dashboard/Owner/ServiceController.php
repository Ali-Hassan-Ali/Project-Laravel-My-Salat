<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::orderBy('service_categorie_id')->get();

        return view('dashboard_owner.services.index', compact('services'));

    }//end of index

    
    public function create()
    {
        $sub_category = ServiceCategory::where('categoreys_id', 
                                                 auth()->guard('owner')->user()->banner->categoreys_id)
                                                ->latest()->get();

        return view('dashboard_owner.services.create', compact('sub_category'));

    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'name'    => ['required'],
            'price'   => ['required','numeric'],
            'quantity'=> ['required','numeric'],
        ]);
        
        try {

            $request['owner_id']             = auth()->guard('owner')->user()->id;
            $request['service_categorie_id'] = $request->service_categorie_id ?? false;

            Service::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.owner.services.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(Service $service)
    {
        $sub_category = ServiceCategory::where('categoreys_id', 
                                                 auth()->guard('owner')->user()->banner->categoreys_id)
                                                ->latest()->get();

        return view('dashboard_owner.services.edit', compact('service','sub_category'));

    }//end of create

    
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name'    => ['required'],
            'price'   => ['required','numeric'],
            'quantity'=> ['required','numeric'],
        ]);
        
        try {

            $request['owner_id']             = auth()->guard('owner')->user()->id;
            $request['service_categorie_id'] = $request->service_categorie_id ?? false;

            $service->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.owner.services.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

   
    public function destroy(Service $service)
    {
        try {

            $service->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.owner.services.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
