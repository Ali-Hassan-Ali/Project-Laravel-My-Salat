<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorey;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    
    public function index()
    {
        $service_categorys = ServiceCategory::latest()->get();

        return view('dashboard_admin.service_categorys.index', compact('service_categorys'));

    }//end of index

    
    public function create()
    {
        $categoreys        = Categorey::all();
        $service_categorys = ServiceCategory::where('parent_id', false)->latest()->get();

        return view('dashboard_admin.service_categorys.create', compact('categoreys','service_categorys'));

    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'name'           => ['required'],
            'categoreys_id'  => ['required'],
        ]);
        
        try {

            $request['parent_id'] = $request->parent_id ?? false;

            ServiceCategory::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.admin.service_categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(ServiceCategory $serviceCategory)
    {
        $categoreys        = Categorey::all();
        $service_categorys = ServiceCategory::where('parent_id', false)->latest()->get();

        return view('dashboard_admin.service_categorys.edit', compact('serviceCategory','categoreys','service_categorys'));

    }//end of edit

    
    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $request->validate([
            'name'           => ['required'],
            'categoreys_id'  => ['required'],
        ]);

        try {

            $request['parent_id'] = $request->parent_id ?? false;

            $serviceCategory->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.admin.service_categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(ServiceCategory $serviceCategory)
    {
        try {

            $serviceCategory->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.admin.service_categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
