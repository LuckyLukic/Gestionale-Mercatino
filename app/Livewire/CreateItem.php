<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\User;
use Livewire\Component;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class CreateItem extends Component
{
    public $userId;

    public $name, $category, $quantity, $description = "", $price;

    public function mount(User $userId) //$userId must match with the paramenter in the route configuration.
    {

        $this->userId = $userId->id;
        logger('ID: ', [$this->userId]);

    }

    protected $rules = [
        'name' => 'required|string',
        'category' => 'required',
        'quantity' => 'required|integer|min:1',
        'description' => 'required|string|max:255',
        'price' => 'required|numeric|between:0,9999999.99',
    ];

    protected function messages()
    {
        return [
            '*.required' => "this field is required",
            'quantity.integer' => "you must enter a number > 0",
            'quantity.min' => "you must enter a number > 0",
        ];
    }



    public function createItem()
    {

        $this->validate();

        try {

            Item::create([
                'name' => $this->name,
                'category' => strtolower($this->category),
                'quantity' => $this->quantity,
                'price' => $this->price,
                'description' => $this->description,
                'user_id' => $this->userId
            ]);

            session()->flash('success', 'Item added to User');

        } catch (ValidationException $e) {

            session()->flash('error', 'Error: ' . $e->getMessage());
        }

        $this->reset();

    }

    public function clear()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.create-item');
    }
}
