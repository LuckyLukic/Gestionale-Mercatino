<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Address;
use Livewire\Component;


class CreateUser extends Component
{
    //User fields
    public $name, $surname, $email, $password, $passwordConfirmation;

    public $address, $city, $province, $postalcode;

    protected $rules = [
        'name' => 'required|string',
        'surname' => 'required|string',
        'email' => 'required|email|unique:users,email',
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

        try {
            User::create([
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'address_id' => $address->id,
            ]);

            $this->dispatch('userCreated');

        } catch (\Exception $e) {
            $this->dispatch('userCreationFailed');
        }

        $this->reset();

    }

    public function delete(User $userId)
    {
        $userId->delete();
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

