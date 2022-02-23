<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index($id)
    {
        $categoreys = Owner::where('id');

        return response()->api(CategoryResource::collection($categoreys));

    }//end of index

}//end of controller
