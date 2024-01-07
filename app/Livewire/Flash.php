<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Flash extends Component
{
    #[On('flash-message')]
    public function flash($type, $message)
    {

        session()->flash($type, $message);
    }

    public function render()
    {
        return view('livewire.flash');
    }
}
