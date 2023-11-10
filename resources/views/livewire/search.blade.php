<div class="relative w-96 max-w-lg px-1 pt-1">
    <input wire:model.live.throttle.500ms="search" type="text"
        class="block w-full flex-1 py-2 px-3 mt-2 outline-none border-none rounded-md bg-slate-100"
        placeholder="Start Typing..." />
    <div class="absolute mt-2 w-full overflow-hidden rounded-md bg-white">

        @foreach ($results as $result)
            <div class="cursor-pointer py-2 px-3 hover:bg-slate-100">
                <p class="text-sm font-medium text-gray-600">{{ $result->title }}</p>
            </div>
        @endforeach
    </div>
</div>
