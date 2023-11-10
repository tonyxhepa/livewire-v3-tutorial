<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
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

    public function changeStatus($id, $status)
    {
        $task = Task::find($id);
        $task->update([
            'status' => $status
        ]);
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
