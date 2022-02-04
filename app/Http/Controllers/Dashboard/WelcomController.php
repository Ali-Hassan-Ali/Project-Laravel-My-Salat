<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');

    }//end of __construct admin
    
    public function index()
    {
        return view('dashboard_admin.welcome');

    }//end of index

}//end of controller
