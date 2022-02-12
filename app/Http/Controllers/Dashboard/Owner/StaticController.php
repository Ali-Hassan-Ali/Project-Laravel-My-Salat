<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function calendar()
    {
        return view('dashboard_owner.statics.calendar');
           
    }//end of statics

}//end of controller
