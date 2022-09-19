<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{   

    public function __construct()
    {
        $this->middleware('permission:admins_read')->only(['index','data']);
        $this->middleware('permission:admins_create')->only(['create', 'store']);
        $this->middleware('permission:admins_update')->only(['edit', 'update']);
        $this->middleware('permission:admins_delete')->only(['delete', 'bulk_delete']);

    }// end of __construct
    
    public function index()
    {
        $admins = Admin::all();
        $roles  = Role::whereNotIn('name', ['super_admin', 'admin', 'user'])->get();

        return view('dashboard.admin.admins.index', compact('admins','roles'));

    }//end of index

    public function data()
    {
        $admins = Admin::all();

        return DataTables::of($admins)
            ->addColumn('record_select', 'dashboard.admin.admins.data_table.record_select')
            ->addColumn('roles', function (Admin $admin) {
                return view('dashboard.admin.admins.data_table.roles', compact('admin'));
            })
            ->editColumn('created_at', function (Admin $admin) {
                return $admin->created_at->format('Y-m-d');
            })
            ->editColumn('image', function (Admin $admin) {
                return view('dashboard.admin.admins.data_table.image', compact('admin'));
            })
            ->addColumn('actions', 'dashboard.admin.admins.data_table.actions')
            ->rawColumns(['record_select', 'roles', 'actions'])
            ->addIndexColumn()
            ->toJson();

    }// end of data

    
    public function create()
    {        
        $roles  = Role::all();

        return view('dashboard.admin.admins.create', compact('roles'));

    }//end of create

    
    public function store(Request $request)
    {

         $request->validate([
            'name'        => ['required','max:255'],
            'email'       => ['required','unique:admins'],
            // 'image'       => ['required','image'],
            'phone'       => ['required','max:11','min:8'],
            'password'    => ['required','confirmed'],
        ]);

        try {

            $request_data             = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
            $request_data['password'] = bcrypt($request->password);

            if ($request->image) {

                $request_data['image'] = $request->file('image')->store('admin_images','public');

            } //end of if
            
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
            'phone'       => ['required','max:11','min:8'],
        ]);

        try {
            
            $request_data = $request->except(['permissions', 'image','password','password_confirmation']);

            if ($request->image) {

                if ($admin->image != 'admin_images/default.png') {

                    Storage::disk('local')->delete('public/'. $admin->image);

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

                Storage::disk('local')->delete('public/'. $admin->image);

            } //end of inner if

            $admin->delete();

            session()->flash('success', 'Data deleted successfully');
            return redirect()->route('dashboard.admin.admins.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
