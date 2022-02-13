<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    public function index()
    {
        $packages = Package::latest()->get();
        
        return view('dashboard_owner.packages.index', compact('packages'));

    }//end of index


    public function create()
    {
        return view('dashboard_owner.packages.create');

    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required','max:255'],
            'to'       => ['required'],
            'form'     => ['required'],
        ]);
        
        try {

            $request['owner_id'] = auth()->guard('owner')->user()->id;

            Package::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.owner.packages.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(Package $package)
    {
        return view('dashboard_owner.packages.edit', compact('package'));

    }//end of edit


    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name'     => ['required','max:255'],
            'to'       => ['required'],
            'form'     => ['required'],
        ]);

        try {

            $request['owner_id'] = auth()->guard('owner')->user()->id;

            $package->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.owner.packages.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update


    public function destroy(Package $package)
    {
        try {

            $package->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.owner.packages.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
