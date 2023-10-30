<x-guest-layout>
    @if (Route::has('login'))
        <livewire:auth.navigation />
    @endif
</x-guest-layout>
