<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Categorey;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{   

    public function __construct()
    {
        $this->middleware('permission:users_read')->only(['index']);
        $this->middleware('permission:users_create')->only(['create', 'store']);
        $this->middleware('permission:users_update')->only(['edit', 'update']);
        $this->middleware('permission:users_delete')->only(['delete', 'bulk_delete']);

    }// end of __construct
    
    public function index()
    {
        return view('dashboard.admin.users.index');

    }//end of index

    public function data()
    {
        $users = User::query();

        return DataTables::of($users)
            ->addColumn('record_select', 'dashboard.admin.admins.data_table.record_select')
            ->editColumn('created_at', function (User $user) {
                return $user->created_at->format('Y-m-d');
            })
            ->editColumn('image', function (User $user) {
                return view('dashboard.admin.users.data_table.image', compact('user'));
            })
            ->editColumn('status', function (User $user) {
                return view('dashboard.admin.users.data_table.status', compact('user'));
            })
            ->addColumn('actions', 'dashboard.admin.admins.data_table.actions')
            ->rawColumns(['record_select', 'actions'])
            ->addIndexColumn()
            ->toJson();

    }// end of data

    
    public function create()
    {        
        return view('dashboard.admin.user.create');

    }//end of create

    
    public function store(Request $request)
    {

         $request->validate([
            'name'        => ['required','max:255'],
            'email'       => ['required','unique:user'],
            // 'image'       => ['required','image'],
            'phone'       => ['required','max:11','min:8'],
            'password'    => ['required','confirmed'],
        ]);

        try {

            $request_data             = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
            $request_data['password'] = bcrypt($request->password);

            if ($request->image) {

                $request_data['image'] = $request->file('image')->store('User_images','public');

            } //end of if
            
            $user = User::create($request_data);
            
            // $user->attachRole('User');
            // $user->syncPermissions($request->permissions);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.User.user.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(User $User)
    {
        return view('dashboard_User.user.edit', compact('User'));

    }//end of edit

    
    public function update(Request $request, User $User)
    {

        $request->validate([
            'name'        => ['required','max:255'],
            'email'       => ['required', Rule::unique('user')->ignore($User->id)],
            'phone'       => ['required','max:11','min:8'],
        ]);

        try {
            
            $request_data = $request->except(['permissions', 'image','password','password_confirmation']);

            if ($request->image) {

                if ($User->image != 'User_images/default.png') {

                    Storage::disk('local')->delete('public/'. $User->image);

                } //end of inner if

                $request_data['image'] = $request->file('image')->store('user_images','public');

            } //end of external if

            $User->update($request_data);

            // $user->syncPermissions($request->permissions);
            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.User.user.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(User $User)
    {

        try {

            if ($User->image != 'User_images/default.png') {

                Storage::disk('local')->delete('public/'. $User->image);

            } //end of inner if

            $User->delete();

            session()->flash('success', 'Data deleted successfully');
            return redirect()->route('dashboard.User.user.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
