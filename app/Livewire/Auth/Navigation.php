<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Navigation extends Component
{

    public function render()
    {
        return view('livewire.auth.navigation')->with([
            'name' => 'Code With Tony...'
        ]);
    }
}
