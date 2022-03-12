<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\SettingResource;

class SettingController extends Controller
{
    public function index()
    {
        $categoreys = User::all();

        return response()->api(SettingResource::collection($categoreys));

    }//end of index

}//end of index
