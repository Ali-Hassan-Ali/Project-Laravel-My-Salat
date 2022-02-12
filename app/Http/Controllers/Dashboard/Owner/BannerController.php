<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {   
        if ($banner->owner_id == auth()->guard('owner')->user()->id) {

            return view('dashboard_owner.banners.edit', compact('banner'));
            
        }//end of if auth

        return view('404');
        
    }//end of edit

    
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'name'  => ['required'],
            'map'   => ['required'],
        ]);

        try {

            $request_data = $request->except(['image']);

            if ($request->image) {

                if ($banner->image != 'banner_images/default.png') {

                    Storage::disk('local')->delete('public/'. $banner->image);

                } //end of if

                $request_data['image'] = $request->file('image')->store('banner_images','public');

            } //end of if

            $request_data['slug'] = str::slug($request->name, '_');

            $banner->update($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->back();

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
