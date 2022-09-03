<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorey;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoreyController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:categories_read')->only(['index','data']);
        $this->middleware('permission:categories_create')->only(['create', 'store']);
        $this->middleware('permission:categories_update')->only(['edit', 'update']);
        $this->middleware('permission:categories_delete')->only(['delete', 'bulk_delete']);

    }// end of __construct
    
    public function index()
    {
        return view('dashboard.admin.categories.index');

    }//end of index

    public function data()
    {
        $categories = Categorey::all();

        return DataTables::of($categories)
            ->editColumn('created_at', function (Categorey $categorey) {
                return $categorey->created_at->format('Y-m-d');
            })
            ->editColumn('logo', function (Categorey $categorey) {
                return view('dashboard.admin.categories.data_table.image', compact('categorey'));
            })
            ->addColumn('actions', 'dashboard.admin.categories.data_table.actions')
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->toJson();

    }// end of data

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorey  $categorey
     * @return \Illuminate\Http\Response
     */
    public function show(Categorey $categorey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorey  $categorey
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorey $categorey)
    {
        return view('dashboard_admin.categoreys.edit', compact('categorey'));

    }//end of edit


    public function update(Request $request, Categorey $categorey)
    {
        $request->validate([
            'name'        => ['required','max:255'],
            // 'logo'        => ['required','image'],
        ]);

        try {

            $request_data = $request->except(['logo']);

            if ($request->logo) {

                $request_data['logo'] = $request->file('logo')->store('categorey_images','public');

            } //end of if

            $categorey->update($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.admin.categoreys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorey  $categorey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorey $categorey)
    {
        //
    }
}
