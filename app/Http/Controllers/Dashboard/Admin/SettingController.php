<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;

class SettingController extends Controller
{
    public function support()
    {
        $supports = Support::all();

        return view('dashboard_admin.settings.supports.index', compact('supports'));

        return view('dashboard_admin.settings.support');
        
    }//end if support

    public function store(Request $request)
    {
        setting($request->all())->save();
        
        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->back();

    }// end of store

}//end of controller
