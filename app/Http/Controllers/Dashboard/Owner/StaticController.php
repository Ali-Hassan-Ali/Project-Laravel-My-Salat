<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Service;
use App\Models\ServiceCategory;

class StaticController extends Controller
{
    public function calendar()
    {
        $packages = Package::where('owner_id', auth()->guard('owner')->user()->banner->category->id)->get();

        $service_categorys = ServiceCategory::with('service')
                                            ->whereRelation('service', 'owner_id', 
                                                auth()->guard('owner')->user()->banner->id)
                                            ->get();

        return view('dashboard_owner.statics.calendar', compact('packages','service_categorys'));
           
    }//end of statics

}//end of controller
