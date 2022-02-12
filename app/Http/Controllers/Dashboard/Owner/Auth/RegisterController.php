<?php

namespace App\Http\Controllers\Dashboard\Owner\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner;

class RegisterController extends Controller
{
    public function index()
    {
        if (!auth()->guard('owner')->check()) {
            
            return view('dashboard_owner.auth.register');

        }//end of if

        return redirect()->route('dashboard.owner.welcome');

    }//end of index login function
    

    public function store(Request $request)
    {

       $request->validate([
            'name'      => ['required'],
            'email'     => ['required', 'email','unique:owners'],
            'password'  => ['required','confirmed'],
            'phone'     => ['required','max:11','min:8'],
        ]);
            
            $request_data = $request->except('password','password_confirmation');
            $request_data['password'] = bcrypt($request->password);

            $owner = Owner::create($request_data);

            $owner->banner()->create(['categoreys_id'=>1]);

            // return event(new \App\Listeners\OwnerCreated($owner));

            $credentials = $request->only('email', 'password');

            $auth = auth()->guard('owner')->attempt($credentials);

            if ($auth) {
                
                session()->flash('success', __('dashboard.login_successfully'));
                return redirect()->route('dashboard.owner.welcome');

            }//end of auth

            return back()->withErrors(['email' => 'The email is incorrect']);

    }//end of login store function


}//end of controller
