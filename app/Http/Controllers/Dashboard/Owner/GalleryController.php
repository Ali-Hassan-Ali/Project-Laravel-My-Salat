<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    
    public function index()
    {
        $gallerys = Gallery::latest()->get();

        return view('dashboard_owner.gallerys.index', compact('gallerys'));

    }//end of index

    
    public function create()
    {
        return view('dashboard_owner.gallerys.create');

    }//end of create

    
    public function store(Request $request)
    {

        $request->validate([
            'title'  => ['required'],
            'images' => ['required','array'],
        ]);

        try {
            
            $request_data = $request->except(['images']);

            foreach ($request->images as $key=>$image) {

                $iimage = Image::make($image)
                                ->resize(350, 150)
                                ->encode('jpg');

                Storage::disk('local')->put('public/gallery_images/' . $image->hashName(), (string)$iimage, 'public');
                $request_data['image']    = 'gallery_images/'. $image->hashName();
                $request_data['owner_id'] = auth()->guard('owner')->user()->id;

                Gallery::create($request_data);
            
            }//end of foreach

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.owner.gallerys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

    
    public function show(Gallery $gallery)
    {   
        
        
    }//end of show

    
    public function edit(Gallery $gallery)
    {
        return view('dashboard_owner.gallerys.edit', compact('gallery'));

    }//end if edit


    public function update(Request $request, Gallery $gallery)
    {

        try {
            
            $request_data = $request->except(['image']);

            if ($gallery->image != 'gallery_images/default.png') {

                Storage::disk('local')->delete('public/'. $gallery->image);

                $request_data['image'] = $request->file('image')->store('gallery_images','public');

            } //end of inner if

            $request_data['owner_id'] = auth()->guard('owner')->user()->id;

            $gallery->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.owner.gallerys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(Gallery $gallery)
    {

        try {

            if ($gallery->image !=  'gallery_images/default.png') {

                Storage::disk('local')->delete('public/'. $gallery->image);

            } //end of inner if

            $gallery->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.owner.gallerys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
