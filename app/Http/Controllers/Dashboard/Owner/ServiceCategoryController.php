<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    
    public function index()
    {
        $service_categorys = ServiceCategory::latest()->get();

        return view('dashboard_owner.service_categorys.index', compact('service_categorys'));

    }//end of index

    
    public function create()
    {
        $sub_category = ServiceCategory::where('parent_id', false)->latest()->get();

        return view('dashboard_owner.service_categorys.create', compact('sub_category'));

    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required'],
        ]);
        
        try {

            $request['owner_id'] = auth()->guard('owner')->user()->id;
            $request['parent_id'] = $request->parent_id ?? false;

            ServiceCategory::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.owner.service_categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(ServiceCategory $serviceCategory)
    {
        $sub_category = ServiceCategory::where('parent_id', false)->latest()->get();

        return view('dashboard_owner.service_categorys.edit', compact('serviceCategory','sub_category'));

    }//end of edit

    
    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $request->validate([
            'name'     => ['required'],
        ]);

        try {

            $request['owner_id']  = auth()->guard('owner')->user()->id;
            $request['parent_id'] = $request->parent_id ?? false;

            $serviceCategory->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.owner.service_categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(ServiceCategory $serviceCategory)
    {
        try {

            $serviceCategory->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.owner.service_categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
