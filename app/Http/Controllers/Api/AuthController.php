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
            'username' => ['required'],
            'phone'    => ['required','numeric','min:9'],
        ]);

        if ($validator->fails()) {
            return response()->api([], 1, $validator->errors()->first());
        }

        $request['password'] = '123123123';

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
            'username' => ['required'],
            'region'   => ['required'],
            'phone'    => ['required','unique:users'],
            // 'image'    => ['required','image'],
            // 'password' => ['required','min:6'],
        ]);


        if ($validator->fails()) {
            return response()->api([], 1, $validator->errors()->first());
        }
        $request['password'] = '123123123';
        $request->merge([
            'password' => bcrypt($request->password),
        ]);

        $user = User::create($request->all());

        $request['password'] = '123123123';
        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {

            $user          = auth()->user();
            $data['user']  = new UserResource($user);
            $data['token'] = $user->createToken('my-app-token')->plainTextToken;

            return response()->api($data);

        } else {

            return response()->api([], 1, __('auth.failed'));

        }//end of else

    }//end of register

    public function user()
    {
        $data['user'] = new UserResource(auth()->user('sanctum'));

        return response()->api($data);

    }// end of user

    public function update(Request $request)
    {
        $data['user'] = new UserResource(auth()->user('sanctum'));

        $user = User::find($data['user']->id);

        $user->update([
            'username' => $request->username,
            'region'   => $request->region,
        ]);

        return response()->api($data);

    }//end of update user

    public function update_user(User $user, Request $request)
    {
        $user = User::find($request->id);

        $user->update([
            'username' => $request->username,
            'region'   => $request->region,
        ]);

        return response()->api($user);

    }//end of update user

}//end of controller
