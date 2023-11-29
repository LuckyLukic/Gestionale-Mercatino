<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\User;
use Livewire\Component;

class Customer extends Component
{

    public $user;

    public $totalItems;

    public $totalAmount;

    public function mount(User $userId)
    {
        $this->user = $userId;

        $this->totalItems = $userId->items()->sum('quantity');

        $this->totalAmount = $userId->items;

    }

    public function delete($itemId)
    {
        Item::find($itemId)->delete();

        session()->flash('success', 'Item Removed correctly!');
        $this->render();
    }






    public function render()
    {
        return view('livewire.customer');
    }
}
