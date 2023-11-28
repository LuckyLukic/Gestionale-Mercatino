<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{

    public $currentRoute;

    public function mount()
    {
        $this->currentRoute = URL::current();
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); //regenerate a new CSRF token to invalidate the old token.
        return $this->redirect('/login', navigate: true);

    }
    public function render()
    {
        return view('livewire.navbar');
    }
}
