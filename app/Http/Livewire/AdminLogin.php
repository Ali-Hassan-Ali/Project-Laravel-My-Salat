<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminLogin extends Component
{
    public $email = '';

    public $password = '';

    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function mount()
    {
        if (Auth::guard('admin')->check()) {
            redirect()->route('dashboard.admin.home')->send();
        }
    }

    public function submit()
    {
        $this->validate();

        $credentials = ['email' => $this->email, 'password' => $this->password];

        if (Auth::guard('admin')->attempt($credentials, $this->remember)) {
            session()->flash('success', __('dashboard.login_successfully'));
            redirect()->route('dashboard.admin.home')->send();

            return;
        }

        $this->addError('email', trans('auth.failed'));
    }

    public function render()
    {
        return view('livewire.dashboard.admin-login');
    }
}
