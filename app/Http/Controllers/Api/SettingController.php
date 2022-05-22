<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Support;
use App\Models\Favored;
use App\Models\Banner;
use App\Models\User;

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

    public function search($categorey_id, $user_id, $search)
    {

        $user = User::find($user_id);

        if ($user) {

            $favoredIds = Favored::where('user_id',$user_id)->pluck('banner_id');

            $banners    = Banner::whereIn('id', $favoredIds)->where('categoreys_id', $categorey_id)->latest()->get();

            return response()->api($banners);
            
        } else {

            $banners = Banner::WhenSearch($search)->where('categoreys_id', $categorey_id)->latest()->get();

            if ($search) {
                
                return response()->api($banners);

            }//end of if

            return response()->api([]);

        }//end of  

    }//end of search

}//end of controller
