<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{   
    public function __construct()
    {
        $this->middleware('admin');

    }//end of __construct admin
    
    public function index()
    {
        $admins = Admin::all();

        return view('dashboard_admin.admins.index', compact('admins'));

    }//end of index

    
    public function create()
    {
        return view('dashboard_admin.admins.create');

    }//end of create

    
    public function store(Request $request)
    {

         $request->validate([
            'name'        => ['required','max:255'],
            'email'       => ['required','unique:users'],
            'image'       => 'image|mimes:jpg,png,jpeg,gif,TIF,ICO,PSD,WebP|max:2048',
            'password'    => ['required','confirmed'],
            // 'permissions' => ['required','min:1'],
        ]);

        try {

            $request_data             = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
            $request_data['password'] = bcrypt($request->password);
            $request_data['phone']    = '1231222';

            if ($request->image) {

                $request_data['image'] = $request->file('image')->store('admin_images','public');

            } //end of if
            // return $request_data;
            $user = Admin::create($request_data);
            
            // $user->attachRole('admin');
            // $user->syncPermissions($request->permissions);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.admin.admins.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(Admin $admin)
    {
        return view('dashboard_admin.admins.edit', compact('admin'));

    }//end of edit

    
    public function update(Request $request, Admin $admin)
    {

        $request->validate([
            'name'        => ['required','max:255'],
            'email'       => ['required', Rule::unique('admins')->ignore($admin->id)],
            // 'password'    => ['required','confirmed'],
            // 'permissions' => ['required','min:1'],
        ]);

        try {
            
            $request_data = $request->except(['permissions', 'image','password','password_confirmation']);

            if ($request->image) {

                if ($admin->image != 'admin_images/default.png') {

                    Storage::disk('local')->delete('/admin_images/' . $admin->image);

                } //end of inner if

                $request_data['image'] = $request->file('image')->store('user_images','public');

            } //end of external if

            $admin->update($request_data);

            // $user->syncPermissions($request->permissions);
            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.admin.admins.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(Admin $admin)
    {

        try {

            if ($admin->image != 'admin_images/default.png') {

                Storage::disk('local')->delete('/admin_images/' . $admin->image);

            } //end of inner if

            $admin->delete();

            session()->flash('success', 'Data deleted successfully');
            return redirect()->route('dashboard.admin.admins.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
