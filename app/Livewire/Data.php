<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Address;
use Livewire\Component;
use Livewire\WithPagination;

class Data extends Component
{

    use WithPagination;

    public $search;

    public $term = "surname";

    public $userSelection;

    public $adminSelection;


    public function updateTerm($term)
    {
        $this->term = $term;
    }



    // public function updatedSearch()  // automatically binded to $search
    // {
    //     $this->index();
    // }


    public function setUserSelection($role)
    {
        if ($role === 'user') {

            $this->userSelection = 'user';
            $this->adminSelection = null;

        } elseif ($role === 'admin') {

            $this->adminSelection = 'admin';
            $this->userSelection = null;

        }
    }

    public function delete(User $user)
    {
        try {

            $addressId = $user->address_id;
            $user->address_id = null; // Disassociate the user from the address before deleting the user
            $user->save();
            $user->delete();

            if ($addressId && User::where('address_id', $addressId)->doesntExist()) {  // Check if any other users are associated with this address

                Address::where('id', $addressId)->delete();
            }

            session()->flash('success', 'User deleted!');

        } catch (\Exception $e) {

            session()->flash('error', 'Error :' . $e->getMessage());

        }
    }

    //gestito redirect con href in blade
    // public function redirectToUser($userId)
    // {

    //     return redirect()->route('user.profile', [$userId]);
    // }
    //gestito redirect con href in blade
    // public function redirectToUpdate($userId)
    // {

    //     return redirect()->route('user.update', [$userId]);
    // }

    public function index()
    {
        try {
            $query = User::query();

            if ($this->userSelection) {

                $query->where('role', 'user');

            } elseif ($this->adminSelection) {

                $query->where('role', 'admin');

            }

            if ($this->search) {
                if ($this->term == 'city') {

                    $query->whereHas('address', function ($query) {
                        $query->where('city', 'LIKE', '%' . $this->search . '%');

                    });
                } else {

                    $query->where($this->term, 'LIKE', '%' . $this->search . '%');

                }
            }

            return $query->paginate(10);

        } catch (\Exception $e) {

            session()->flash('error', 'Error :' . $e->getMessage());

        }
    }


    public function render()  //called whenever a public property in the component changes
    {
        $users = $this->index();
        return view('livewire.data', compact('users'));

    }
}
