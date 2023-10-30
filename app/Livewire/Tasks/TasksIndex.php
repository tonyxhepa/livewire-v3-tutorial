<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use Livewire\Attributes\Rule;
use Livewire\Component;

class TasksIndex extends Component
{
    public TaskForm $form;

    public function save()
    {
        $this->validate();
        $this->form->createTask();
        $this->form->reset();
    }
    public function render()
    {
        return view('livewire.tasks.tasks-index', [
            'tasks' => auth()->user()->tasks,
        ])->layout('layouts.app');
    }
}
