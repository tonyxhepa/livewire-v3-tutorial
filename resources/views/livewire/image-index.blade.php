<div class="max-w-7xl mx-auto flex">
    <div class="w-7/12">
        Images
    </div>
    <div class="4/12">
        <form class="mt-4 bg-white p-4 rounded-md" wire:submit="save">
            <div class="mt-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
                    Image</label>
                <input wire:model="photos"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    type="file" multiple>
                @if ($photos)
                    @foreach ($photos as $photo)
                        <img class="w-18 h-18 rounded-md" src="{{ $photo->temporaryUrl() }}">
                    @endforeach
                @endif
                @error('photos.*')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
                @error('photos')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
                <x-primary-button>Upload</x-primary-button>
            </div>
        </form>
    </div>
</div>
