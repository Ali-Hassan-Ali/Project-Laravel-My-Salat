<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Categorey;

class WelcomeController extends Controller
{
    public function index()
    {
        $categoreys = Categorey::all();

        return response()->api(CategoryResource::collection($categoreys));

    }//end of index

}//end of controller
