<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerController extends Controller
{
    public function index($id)
    {
        $categoreys = Owner::where('id')->get();

        return response()->api(CategoryResource::collection($categoreys));

    }//end of index

}//end of controller
