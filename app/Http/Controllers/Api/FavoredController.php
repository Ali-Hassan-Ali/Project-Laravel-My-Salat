<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Favored;
use App\Models\Categorey;

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

        $categorey_id = Banner::find($request->banner_id)->categoreys_id;

        $has_favored = Favored::where([
                        'banner_id' => $request->banner_id,
                        'user_id'   => $request->user_id,
                    ])->first();

        if ($has_favored) {

            $has_favored->delete();

            return response()->api(false);

        } else {

            Favored::create([
                'user_id'      => $request->user_id,
                'banner_id'    => $request->banner_id,
                'categorey_id' => $categorey_id,
            ]);

            return response()->api(true);

        }//end of check

    }//end of store

    public function get_favored($user_id)
    {   
        $favoreds = Categorey::select('id','name')->withCount(['favoreds' => function($q) use ($user_id) {
                        $q->where('user_id', $user_id);
                    }])->get();

        return response()->api($favoreds);

    }//end of get get_favored

}//end of controller
