<div class="flex justify-center mt-4">
    <div class="w-8/12 p-4 flex justify-between rounded-md bg-slate-200 shadow-md">
        @foreach ($tasksByStatus as $status)
            <div class="flex flex-col justify-center items-center">
                <span @class([
                    'w-16 h-16 flex justify-center items-center rounded-full text-lg text-black border-2',
                    $status->status->color() => $status->status,
                ])>
                    {{ $status->count }}
                </span>
                <span>{{ Str::of($status->status->value)->headline() }}</span>
            </div>
        @endforeach
    </div>
</div>
