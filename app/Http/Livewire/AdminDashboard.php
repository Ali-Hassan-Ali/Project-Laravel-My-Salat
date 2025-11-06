<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function mount()
    {
        if (! Auth::guard('admin')->check()) {
            return redirect()->route('dashboard.admin.login');
        }
    }

    public function render()
    {
        // you can pass any dashboard data here
        return view('livewire.dashboard.admin-dashboard');
    }
}
