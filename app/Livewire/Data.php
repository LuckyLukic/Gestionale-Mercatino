<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Data extends Component
{
    public $users = [];



    public function delete(User $userId)
    {
        $userId->delete();
    }

    public function redirectToUser($userId)
    {

        return redirect()->route('user.profile', [$userId]);
    }

    public function render()
    {

        return view('livewire.data', [
            $this->users = User::all()
        ]);
    }
}
