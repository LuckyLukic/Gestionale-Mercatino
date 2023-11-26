<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\URL;

class Navbar extends Component
{

    public $currentRoute;

    public function mount()
    {
        $this->currentRoute = URL::current();
    }
    public function render()
    {
        return view('livewire.navbar');
    }
}
