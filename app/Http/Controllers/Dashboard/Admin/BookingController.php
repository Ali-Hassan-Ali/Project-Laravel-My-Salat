<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorey;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::latest()->get();

        return view('dashboard_admin.bookings.index', compact('bookings'));

    }//end of index

    
    public function create()
    {   
        $categoreys = Categorey::all();

        return view('dashboard_admin.bookings.create', compact('categoreys'));

    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'name'          => ['required','max:255'],
            'categoreys_id' => ['required','numeric'],
        ]);

        try {

            Booking::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.admin.bookings.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    
    public function edit(Booking $booking)
    {
        $categoreys = Categorey::all();

        return view('dashboard_admin.bookings.edit', compact('booking','categoreys'));

    }//end of edit

    
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'name'          => ['required','max:255'],
            'categoreys_id' => ['required','numeric'],
        ]);

        try {

            $booking->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.admin.bookings.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(Booking $booking)
    {
        try {

            $booking->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.admin.bookings.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller