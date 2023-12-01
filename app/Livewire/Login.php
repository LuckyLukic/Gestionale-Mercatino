<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $email;
    public $password;

    protected $rules = [

        'email' => 'required|email',  //users plurale because is referred to the table
        'password' => 'required',

    ];

    public function loginUser(Request $request)
    {
        $validate = $this->validate();

        try {
            if (Auth::attempt($validate)) {
                $request->session()->regenerate();

                if (Auth::user()->role === 'admin') {
                    return $this->redirect('/', navigate: true);

                } else {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    session()->flash('error', 'Access denied: You are not an admin');
                    return $this->redirect('/login', navigate: true);
                }
            }

            $this->addError('email', 'Email or Password is not correct!');
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred during login: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
