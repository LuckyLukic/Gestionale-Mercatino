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


    public function updateTerm($term)
    {

        $this->term = $term;
    }

    public function index()
    {

        if ($this->search) {

            if ($this->term == 'city') {
                $this->users = User::where('role', '<>', 'admin')->whereHas('address', function ($query) {
                    $query->where('city', 'LIKE', $this->search . '%');
                })->paginate(10);
            } else {

                return User::where('role', '<>', 'admin')->where($this->term, 'LIKE', '%' . $this->search . '%')->orderBy($this->term)->paginate(10);

            }
        } else {
            return User::where('role', '<>', 'admin')->paginate(10);
        }

    }

    public function updatedSearch()  // automatically binded to $search
    {

        $this->index();

    }


    public function delete(User $user)
    {

        $addressId = $user->address_id;

        $user->address_id = null; // Disassociate the user from the address before deleting the user
        $user->save();

        $user->delete();

        if ($addressId && User::where('address_id', $addressId)->doesntExist()) {  // Check if any other users are associated with this address

            Address::where('id', $addressId)->delete();
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

    public function render()  //called whenever a public property in the component changes
    {
        $users = $this->index();
        return view('livewire.data', compact('users'));
    }
}
