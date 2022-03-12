<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\SettingResource;

class SettingController extends Controller
{
    public function support()
    {
        return response()->api(setting('support'));

    }//end of support

}//end of controller
