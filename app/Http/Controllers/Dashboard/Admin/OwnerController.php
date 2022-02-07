<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{

    public function index()
    {
        $owners = Owner::all();

        return view('dashboard_admin.owners.index',compact('owners'));

    }//end of index

    
    public function create()
    {
        return view('dashboard_admin.owners.create');

    }//endof create


    public function store(Request $request)
    {
        $request->validate([
            'name'        => ['required','max:255'],
            'email'       => ['required','unique:users'],
            'image'       => ['required','image'],
            'phone'       => ['required','max:11','min:8'],
            'password'    => ['required','confirmed'],
        ]);

        try {

            $request_data             = $request->except(['password', 'password_confirmation', 'image']);
            $request_data['password'] = bcrypt($request->password);

            if ($request->image) {

                $request_data['image'] = $request->file('image')->store('owner_images','public');

            } //end of if

            Owner::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.admin.owners.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

    
    public function show(Owner $owner)
    {
        
    }

    
    public function edit(Owner $owner)
    {
        return view('dashboard_admin.owners.edit', compact('owner'));
        
    }//end of edit

    
    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'name'        => ['required','max:255'],
            'email'       => ['required', Rule::unique('admins')->ignore($owner->id)],
            'image'       => ['required','image'],
            'phone'       => ['required','max:11','min:8'],
        ]);

        try {

            $request_data             = $request->except(['password', 'password_confirmation', 'image']);
            $request_data['password'] = bcrypt($request->password);

            if ($request->image) {

                if ($owner->image != 'owner_images/default.png') {

                    Storage::disk('local')->delete('/owner_images/' . $owner->image);

                } //end of inner if

                $request_data['image'] = $request->file('image')->store('owner_images','public');

            } //end of if

            $owner->update($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.admin.owners.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(Owner $owner)
    {
        try {

            if ($owner->image != 'owner_images/default.png') {

                Storage::disk('local')->delete('/owner_images/' . $owner->image);

            } //end of inner if

            $owner->delete();

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.admin.owners.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy


}//end of controller
