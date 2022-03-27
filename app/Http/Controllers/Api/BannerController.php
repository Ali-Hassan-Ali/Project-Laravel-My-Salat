<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index($id)
    {
        if ($id == '9') {
            
            $banners = Banner::where('categoreys_id', $id)->pluck('id');

            $products = Product::whereIn('banner_id', $banners)->with('images')->get();

            return response()->api($products);
        }

        $banners = Banner::where('categoreys_id',$id)->get();

        return response()->api($banners);

    }//end of index

}//end of controller
