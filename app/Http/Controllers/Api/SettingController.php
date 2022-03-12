<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Support;

class SettingController extends Controller
{
    public function support(Request $request)
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

    }//end of support

}//end of controller
