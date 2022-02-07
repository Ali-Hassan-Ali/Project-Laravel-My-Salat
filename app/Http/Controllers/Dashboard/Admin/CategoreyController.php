<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorey;
use Illuminate\Http\Request;

class CategoreyController extends Controller
{
    
    public function index()
    {
        $categoreys = Categorey::all();

        return view('dashboard_admin.categoreys.index', compact('categoreys'));

    }//end of index

    
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
