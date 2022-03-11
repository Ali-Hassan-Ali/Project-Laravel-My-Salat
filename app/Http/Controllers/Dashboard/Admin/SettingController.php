<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function support()
    {
        return view('dashboard_admin.setting.support');
        
    }//end if support

    public function store(Request $request)
    {
        setting($request->all())->save();
        
        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->back();

    }// end of store

}//end of controller
