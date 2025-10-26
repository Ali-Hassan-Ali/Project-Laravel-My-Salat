<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Models\Banner;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index($id = 1)
    {
        if ($id == '6') {
            
            $banners = Banner::where('categoreys_id', $id)->with('cars')->get();

            return response()->api($banners);
        }

        if ($id == '7') {
            
            $banners = Banner::where('categoreys_id', $id)->with('product')->get();

            return response()->api($banners);
        }

        if ($id == '8') {
            
            $products = Banner::where('categoreys_id', $id)->get();

            return response()->api($products);
        }

        $banners = Banner::where('categoreys_id',$id)->get();

        return response()->api($banners);

    }//end of index

}//end of controller
