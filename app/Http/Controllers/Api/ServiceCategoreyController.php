<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceCategorey;
use Illuminate\Http\Request;

class ServiceCategoreyController extends Controller
{

    public function index()
    {
        $categoreys = ServiceCategorey::all();

        return response()->api(ServiceCategorey::collection($categoreys));

    }//end of index

}//end of controller
