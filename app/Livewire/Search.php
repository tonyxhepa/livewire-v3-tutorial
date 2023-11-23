<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;

class Search extends Component
{

    #[Url]
    public $search = '';

    public function render()
    {
        $results = [];
        if (strlen($this->search) > 0) {
            $results = auth()->user()->tasks()->where('title', 'like', '%' . $this->search . '%')->get();
        }
        return view('livewire.search', compact('results'));
    }
}
