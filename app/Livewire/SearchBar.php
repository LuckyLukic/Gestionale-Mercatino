<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBar extends Component
{

    public function rendering()
    {
        $this->dispatch('rendering');
    }
    public function render()
    {
        return view('livewire.search-bar');
    }
}
