<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Address;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;



#[Title('Create User')]
class CreateUser extends Component
{
    //User fields
    public $name, $surname, $email, $password, $passwordConfirmation;

    public $address, $city, $province, $postalcode;

    protected $rules = [
        'name' => 'required|string',
        'surname' => 'required|string',
        'email' => 'required|email|unique:users',  //users plurale because is referred to the table
        'password' => 'required|min:8',
        'passwordConfirmation' => 'required|same:password',
        'address' => 'required',
        'city' => 'required',
        'province' => 'required',
        'postalcode' => 'required'
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


    public function create()
    {

        $this->validate();

        try {

            $existingAddress = Address::where('address', $this->address)
                ->where('city', $this->city)
                ->where('province', $this->province)
                ->where('postalcode', $this->postalcode)
                ->first();

            if (!$existingAddress) {
                $address = Address::create([

                    'address' => $this->address,
                    'city' => $this->city,
                    'province' => $this->province,
                    'postalcode' => $this->postalcode,
                ]);

            } else {

                $address = $existingAddress;

            }

            User::create([
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'address_id' => $address->id,
            ]);

            session()->flash('success', 'Customer created!');
            $this->reset();



        } catch (ValidationException $e) {

            session()->flash('error', 'Error: ' . $e->getMessage());
            $this->reset();

        }

        $this->redirect('/database', navigate: true);

    }

    public function delete()
    {

        try {

            $user = User::find($this->id);
            if ($user) {
                $user->delete();
                session()->flash('success', 'User deleted!.');

            }
        } catch (ModelNotFoundException $e) {

            session()->flash('error', 'User not found.');

        }

        return $this->redirect('/database', navigate: true);

    }

    public function clear()
    {
        $this->reset();
    }

    public function render()
    {

        return view('livewire.create-user');
    }
}

