<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Data extends Component
{
    public $users;
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

            $this->users = User::where($this->term, 'LIKE', '%' . $this->search . '%')->get();

        } else {
            $this->users = User::all();
        }

    }

    public function updatedSearch()
    {

        $this->index();

    }


    public function delete(User $userId)
    {
        $userId->delete();
        $this->render();
    }

    public function redirectToUser($userId)
    {

        return redirect()->route('user.profile', [$userId]);
    }

    public function redirectToUpdate($userId)
    {

        return redirect()->route('user.update', [$userId]);
    }

    public function render()
    {
        return view('livewire.data', [
            'users' => $this->users
        ]);
    }
}
