<?php

namespace App\Livewire;

use App\Enums\RoleEnum;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{

    public $name, $surname, $email, $password, $passwordConfirmation;

    protected $rules = [
        'name' => 'required|string',
        'surname' => 'required|string',
        'email' => 'required|email|unique:users',  //users plurale because is referred to the table
        'password' => 'required|min:8',
        'passwordConfirmation' => 'required|same:password',

    ];

    protected function messages()
    {
        return [
            '*.required' => "this field is required",
            'email.email' => "email format is wrong",
            'password.min' => 'password must be min 8 chars',
            'password.unique:users' => 'this password is already taken',
            'passwordConfirmation.same' => 'password and confirmation password do not match',
        ];
    }

    public function registerUser()
    {

        $this->validate();

        try {

            $user = User::create([
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'role' => RoleEnum::ADMIN,
            ]);

            Auth::login($user); //to login automatically after the registration success
            session()->flash('success', 'Registration done!');
            return $this->redirect('/', navigate: true);

        } catch (\Exception $e) {

            session()->flash('error', 'Error: ' . $e->getMessage());

        }

    }

    public function render()
    {
        return view('livewire.register');
    }
}
