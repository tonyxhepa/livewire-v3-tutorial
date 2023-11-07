<?php

namespace App\Livewire\Tasks;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return view('skeleton');
    }


    #[On('task-created')]
    public function render()
    {
        return view('livewire.tasks.tasks-list', [
            'tasks' => auth()->user()->tasks()->paginate(5),
            'tasksByStatus' => auth()->user()->tasks()->select('status', DB::raw('COUNT(*) as count'))
                ->groupBy('status')
                ->orderBy('status', 'desc')
                ->get()
        ]);
    }
}
