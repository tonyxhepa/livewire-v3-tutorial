 <div class="w-7/12">
     <livewire:tasks.tasks-count :$tasksByStatus />
     <div class="px-6">
         @foreach ($tasks as $task)
             <div
                 class="my-4 px-4 py-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                 <div class="p-4 leading-normal">
                     <div class="flex justify-between mb-4">
                         <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                             {{ $task->title }}
                         </h5>
                         <span
                             class="px-2 py-1 border border-slate-200 rounded-md flex justify-end">{{ $task->deadline->diffForHumans() }}</span>
                     </div>
                     <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $task->description }}</p>
                 </div>
             </div>
         @endforeach
     </div>
     <div class="mt-2 mb-12 p-2">
         {{ $tasks->links() }}
     </div>
 </div>
