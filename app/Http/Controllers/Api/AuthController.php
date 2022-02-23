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
            'phone'    => ['required','numeric','min:9'],
        ]);

        if ($validator->fails()) {
            return response()->api([], 1, $validator->errors()->first());
        }

        $request['password'] = '123123123';
        $user = User::where('phone', $request->phone)->first();

        if (!$user) {

            $user = User::create([
                'name'          => 'name',
                'phone'         => $request->phone,
                'password'      => bcrypt('123123123'),
            ]);

            $credentials = ['phone' => $user->phone, 'password' => $request->password];

            if (Auth::attempt($credentials)) {

                $user          = auth()->user();
                $data['user']  = new UserResource($user);
                $data['token'] = $user->createToken('my-app-token')->plainTextToken;

                return response()->api($data);

            } else {

                return response()->api([], 1, __('auth.failed'));

            }//end of else

        }//end of user

        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {

            $user          = auth()->user();
            $data['user']  = new UserResource($user);
            $data['token'] = $user->createToken('my-app-token')->plainTextToken;

            return response()->api($data);

        } else {

            return response()->api([], 1, __('auth.failed'));

        }//end of else

    }//end of login

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'    => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->api([], 1, $validator->errors()->first());
        }

        $request->merge([
            'password' => bcrypt($request->password),
            'type' => 'user'
        ]);

        $user = User::create($request->all());

        $data['user']  = new UserResource($user);
        $data['token'] = $user->createToken('my-app-token')->plainTextToken;

        return response()->api($data);

    }//end of register

    public function user()
    {
        $data['user'] = new UserResource(auth()->user('sanctum'));

        return response()->api($data);

    }// end of user

}//end of controller
