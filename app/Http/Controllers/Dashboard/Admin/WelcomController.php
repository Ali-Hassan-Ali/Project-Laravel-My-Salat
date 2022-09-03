<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorey;
use App\Models\Owner;

class WelcomController extends Controller
{
    
    public function index()
    {
        $min_categorys = Categorey::all();

        return view('dashboard.admin.home', compact('min_categorys'));

    }//end of index

}//end of controller
