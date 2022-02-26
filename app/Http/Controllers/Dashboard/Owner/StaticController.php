<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Package;
use App\Models\Service;
use App\Models\Booking;
use App\Models\ServiceCategory;

class StaticController extends Controller
{
    public function calendar()
    {
        $orders   = Order::with(['package','booking','user'])->get();
        $packages = Package::where('owner_id', auth()->guard('owner')->user()->banner->category->id)->get();
        $bookings = Booking::where('categoreys_id', auth()->guard('owner')->user()->banner->category->id)->get();

        $service_categorys = ServiceCategory::with('service')
                                            ->whereRelation('service', 'banner_id', 
                                                auth()->guard('owner')->user()->banner->id)
                                            ->get();

        return view('dashboard_owner.statics.calendar', compact('packages','service_categorys','bookings','orders'));
           
    }//end of statics

}//end of controller
