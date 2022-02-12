<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomController extends Controller
{
    
    public function index()
    {
        return view('dashboard_admin.welcome');

    }//end of index

}//end of controller
