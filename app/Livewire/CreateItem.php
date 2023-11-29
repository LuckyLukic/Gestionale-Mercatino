<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class CreateItem extends Component
{
    public $userId;

    public $name, $category, $quantity, $description = "", $price;



    public function mount(User $userId) //$userId must match with the paramenter in the route configuration.
    {

        $this->userId = $userId->id;

    }

    public function createItem()
    {


    }
    public function render()
    {
        return view('livewire.create-item');
    }
}
