<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Database\Eloquent\ModelNotFoundException;

#[Title('Update Item')]
class UpdateItem extends Component
{


    public $userId;

    public $itemId, $name, $category, $quantity, $description, $price;

    public function mount(Item $itemId) //$userId must match with the paramenter in the route configuration.
    {

        $this->userId = $itemId->user_id;
        $this->itemId = $itemId->id;
        $this->name = $itemId->name;
        $this->category = $itemId->category;
        $this->quantity = $itemId->quantity;
        $this->description = $itemId->description;
        $this->price = $itemId->price;

        logger('CATEGORY: ', [$this->category]);

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



    public function updateItem()
    {

        $this->validate();

        try {
            $item = Item::find($this->itemId);

            $item->update([
                'name' => $this->name,
                'category' => strtolower($this->category),
                'quantity' => $this->quantity,
                'price' => $this->price,
                'description' => $this->description,
            ]);

            session()->flash('success', 'Item added to User');

            return redirect()->route('user.profile', [$this->userId]);

        } catch (\Exception $e) {

            session()->flash('error', 'Error: ' . $e->getMEssage());
            $this->reset();
        }

    }

    public function delete()
    {
        try {

            $item = Item::find($this->itemId);

            if ($item) {

                $item->delete();
                session()->flash('success', 'Item deleted!');

            }

        } catch (ModelNotFoundException $e) {

            session()->flash('error', 'Error :' . $e->getMessage());

        }

        $this->redirectRoute('user.profile', [$this->userId]);

    }


    public function render()
    {
        return view('livewire.update-item');
    }
}
