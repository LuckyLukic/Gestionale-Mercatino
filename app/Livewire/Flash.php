<?php

namespace App\Livewire;

use Livewire\Component;

class Flash extends Component
{
    #[On('success')]
    public function flash($message)
    {

        session()->flash('success', $message['message']);
    }
    public function render()
    {
        return view('livewire.flash');
    }
}
