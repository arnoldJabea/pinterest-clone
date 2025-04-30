<!-- resources/views/cards/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes cartes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @forelse ($cards as $card)
            <div class="bg-white shadow p-4 rounded mb-4">
                <h3 class="text-lg font-bold">{{ $card->title }}</h3>
                <p>{{ $card->description }}</p>
            </div>
        @empty
            <p>Aucune carte enregistrée.</p>
        @endforelse
    </div>
</x-app-layout>