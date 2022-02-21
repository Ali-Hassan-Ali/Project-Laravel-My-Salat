<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone'    => ['required','numeric'],
        ]);

        if ($validator->fails()) {
            return response()->api([], 1, $validator->errors()->first());
        }

        $user = User::where('phone', $request->phone)
                    ->where('status', false)
                    ->first();

        if (!$user) {

            $user = User::create([
                'name'          => 'name',
                'password'      => bcrypt('123123123'),
                'hash_password' => '123123123',
            ]);

        }//end of user

        $credentials = $request->only('phone', 'password' => $user->password);

        if (Auth::attempt($credentials)) {

            $user          = Auth::user();
            $data['user']  = new UserResource($user);
            $data['token'] = $user->createToken('my-app-token')->plainTextToken;

            return response()->api($data);

        } else {

            return response()->api([], 1, __('auth.failed'));

        }//end of else

    }//end of login

}//end of controller
