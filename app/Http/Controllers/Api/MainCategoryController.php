<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorey;
use App\Http\Resources\CategoryResource;

class MainCategoryController extends Controller
{
    public function index()
    {
        $categoreys = Categorey::all();

        return response()->api(CategoryResource::collection($categoreys));

    }//end of index

}//end of controller
