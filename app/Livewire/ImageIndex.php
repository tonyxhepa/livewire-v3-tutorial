<?php

namespace App\Livewire;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageIndex extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    #[Rule(['photos.*' => 'image|max:1024'])]
    public $photos = [];

    public function save()
    {
        $this->validate();
        $images = [];
        if (!is_null($this->photos)) {
            foreach ($this->photos as $photo) {
                $name = $photo->hashName();
                $path = $photo->storeAs('images', $name, 'public');
                $images[] = ['name' => $name, 'path' => $path];
            }
        }
        foreach ($images as $image) {
            Image::create($image);
        }

        $this->reset();
        unset($this->images);
    }

    #[Computed(persist: true)]
    public function images()
    {
        return Image::all();
    }

    public function download($id)
    {
        $image = Image::find($id);
        // return Storage::disk('public')->download($image->path, 'image.png');

        return response()->download(storage_path('app/public/' . $image->path), 'image.png');
    }
    public function render()
    {
        return view('livewire.image-index')->layout('layouts.app');
    }
}
