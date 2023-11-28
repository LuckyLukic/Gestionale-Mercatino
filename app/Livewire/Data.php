<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Data extends Component
{
    public $users = [];
    public $search;

    public $term = "surname";



    public function mount()
    {

        $this->index();
    }

    public function updateTerm($term)
    {

        $this->term = $term;
    }

    public function index()
    {

        if ($this->search) {

            if ($this->term == 'city') {
                $this->users = User::whereHas('address', function ($query) {
                    $query->where('city', 'LIKE', $this->search . '%');
                })->get();
            } else {

                $this->users = User::where($this->term, 'LIKE', '%' . $this->search . '%')->orderBy($this->term)->get();

            }
        } else {
            $this->users = User::all();
        }

    }

    public function updatedSearch()  // automatically binded to $search
    {

        $this->index();

    }


    public function delete(User $userId)
    {
        $userId->delete();
        $this->render();
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
        return view('livewire.data', [
            'users' => $this->users
        ]);
    }
}
