<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Support;
use App\Models\Banner;

class SettingController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'        => ['required'],
            'message'      => ['required'],
            'phone'        => ['required'],
            'user_id'      => ['required'],
        ]);

        if ($validator->fails()) {

            return response()->api([], 1, $validator->errors()->first());

        }//end of if

        $support = Support::create($request->all());

        return response()->api($support);

    }//end of store

    public function show($id)
    {
        $support = Support::where('user_id', $id)->get();

        return response()->api($support);

    }//end of show

    public function search($search)
    {
        $banners = Banner::WhenSearch($search)->latest()->get();

        if ($search) {
            
            return response()->api($banners);
        }

        return response()->api([]);

    }//end of search

}//end of controller
