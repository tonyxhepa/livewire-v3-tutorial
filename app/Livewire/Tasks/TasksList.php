<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
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
        unset($this->tasksByStatus);
    }

    public function delete(Task $task)
    {
        $task->delete();
        unset($this->tasksByStatus);
    }

    #[Computed()]
    public function tasks()
    {
        return auth()->user()->tasks()->orderBy('id', 'desc')->paginate(5);
    }

    #[Computed(persist: true)]
    public function tasksByStatus()
    {
        return auth()->user()->tasks()->select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->orderBy('status', 'desc')
            ->get();
    }

    #[On('task-created')]
    public function taskCreated()
    {
        unset($this->tasksByStatus);
    }


    public function render()
    {
        return view('livewire.tasks.tasks-list');
    }
}
