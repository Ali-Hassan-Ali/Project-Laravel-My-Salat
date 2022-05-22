<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Favored;

class FavoredController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'   => ['required'],
            'banner_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->api([], 1, $validator->errors()->first());
        }

        $favored = Favored::create([
            'user_id'  => $request->user_id,
            'banner_id'=> $request->banner_id,
        ]);

        return response()->api($favored);

    }//end of store

    public function get_favored($user_id)
    {   
        $favoreds = Favored::where('user_id', $user_id)->get();

        return response()->api($favoreds);

    }//end of get get_favored

}//end of controller
