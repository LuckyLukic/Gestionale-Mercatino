<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\User;
use Livewire\Component;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Customer extends Component
{

    public $user;

    public $totalItems;

    public $totalAmount;

    public function mount(User $userId)
    {
        $this->user = $userId;

        $this->totalItems = $userId->items()->sum('quantity');

        $this->totalAmount = $userId->items->sum(function ($item) {
            return $item->quantity * $item->price;
        });

    }

    public function delete($itemId)
    {
        try {

            $item = Item::find($itemId);

            if ($item) {
                $item->delete();
            }

            session()->flash('success', 'Item Removed correctly!');

        } catch (ModelNotFoundException $e) {

            session()->flash('error', 'Error: ' . $e->getMessage());

        }

        $this->render();

    }

    public function render()
    {
        return view('livewire.customer');
    }
}
