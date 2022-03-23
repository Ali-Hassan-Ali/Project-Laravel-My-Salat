<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index($id)
    {
        $banners = Banner::where('categoreys_id',$id)->get();

        return response()->api($banners);

    }//end of index

}//end of controller
