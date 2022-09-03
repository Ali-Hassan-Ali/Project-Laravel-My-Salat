<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Owner;
use App\Models\Categorey;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OwnerController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:owners_read')->only(['index','data']);
        $this->middleware('permission:owners_create')->only(['create', 'store']);
        $this->middleware('permission:owners_update')->only(['edit', 'update']);
        $this->middleware('permission:owners_delete')->only(['delete', 'bulk_delete']);

    }// end of __construct
    

    public function index()
    {
        return view('dashboard.admin.owners.index');

    }//end of index

    public function data()
    {
        $owners = Owner::query();

        return DataTables::of($owners)
            ->addColumn('record_select', 'dashboard.admin.admins.data_table.record_select')
            ->editColumn('created_at', function (Owner $owner) {
                return $owner->created_at->format('Y-m-d');
            })
            ->editColumn('image', function (Owner $owner) {
                return view('dashboard.admin.owners.data_table.image', compact('owner'));
            })
            ->editColumn('status', function (Owner $owner) {
                return view('dashboard.admin.owners.data_table.status', compact('owner'));
            })
            ->addColumn('categorey', function (Owner $owner) {
                return $owner->banner->category->name;
            })
            ->addColumn('actions', 'dashboard.admin.admins.data_table.actions')
            ->rawColumns(['record_select', 'actions'])
            ->addIndexColumn()
            ->toJson();

    }// end of data

    
    public function create()
    {
        $categoreys = Categorey::all();

        return view('dashboard_admin.owners.create', compact('categoreys'));

    }//endof create


    public function store(Request $request)
    {

        $request->validate([
            'name'          => ['required','max:255'],
            'email'         => ['required','unique:owners'],
            'phone'         => ['required','max:11','min:8'],
            'password'      => ['required','confirmed'],
            'categoreys_id' => ['required'],
        ]);

        try {

            $request_data             = $request->except(['password', 'password_confirmation', 'image','categoreys_id']);
            $request_data['password'] = bcrypt($request->password);

            if ($request->image) {

                $request_data['image'] = $request->file('image')->store('owner_images','public');

            } //end of if

            $owner = Owner::create($request_data);

            $owner->banner()->create(['categoreys_id'=> $request->categoreys_id]);

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

        $categoreys_id = $owner->banner()->first()->categoreys_id;
        $categoreys = Categorey::all();

        return view('dashboard_admin.owners.edit', compact('owner','categoreys','categoreys_id'));
        
    }//end of edit

    
    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'name'          => ['required','max:255'],
            'email'         => ['required', Rule::unique('owners')->ignore($owner->id)],
            'phone'         => ['required','max:11','min:8'],
            'categoreys_id' => ['required'],
        ]);

        if ($request->password) {

            $request->validate([
                'password'      => ['required','confirmed'],
            ]);
        }

        try {

            $request_data = $request->except(['image','password','password_confirmation','categoreys_id']);

            if ($request->password) {

                $request_data['password'] = bcrypt($request->password);

            }//end of password

            if ($request->image) {

                if ($owner->image != 'owner_images/default.png') {

                    Storage::disk('local')->delete('public/'. $owner->image);

                } //end of inner if

                $request_data['image'] = $request->file('image')->store('owner_images','public');

            } //end of if

            $owner->update($request_data);
            $owner->banner()->first()->update(['categoreys_id'=> $request->categoreys_id]);

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

                Storage::disk('local')->delete('public/'. $owner->image);

            } //end of inner if

            $owner->delete();
            $owner->banner()->first()->delete();

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.admin.owners.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy


}//end of controller
