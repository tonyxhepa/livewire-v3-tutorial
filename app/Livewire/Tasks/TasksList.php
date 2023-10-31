<?php

namespace App\Livewire\Tasks;

use Livewire\Component;

class TasksList extends Component
{
    public $tasks;

    public function mount($tasks)
    {
        $this->tasks = $tasks;
    }
    public function render()
    {
        return view('livewire.tasks.tasks-list');
    }
}
