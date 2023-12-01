<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Homepage extends Component
{

    public $totalUsers;

    public $totalItems;

    public $totalItemsValue;

    public $averageItemsPerClient;

    public $bestCategory;

    public $potentialEarning;


    public function mount()
    {

        $this->totalUsers = User::count();
        $this->totalItems = Item::sum('quantity');
        $this->totalItemsValue = Item::sum(DB::raw('quantity * price'));

        if ($this->totalUsers > 0) {
            $this->averageItemsPerClient = round($this->totalItems / $this->totalUsers);
        } else {
            $this->averageItemsPerClient = 0;
        }

        $this->bestCategory = Item::selectRaw('category, COUNT(*) as item_count')
            ->groupBy('category')
            ->orderBy('item_count', 'desc')
            ->first();

        $this->potentialEarning = $this->totalItemsValue > 0 ? $this->totalItemsValue * 0.30 : 0;

    }

    public function render()
    {
        return view('livewire.homepage');
    }
}
