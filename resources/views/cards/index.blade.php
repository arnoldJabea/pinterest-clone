<!-- resources/views/cards/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes cartes') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto">
        @forelse ($cards as $card)
        <div class="bg-white shadow p-4 rounded mb-6">
            <h3 class="text-lg font-bold mb-2">{{ $card->title }}</h3>
            <p class="mb-4">{{ $card->description }}</p>

            @if ($card->image)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $card->image) }}" alt="Image" class="w-48 rounded border">
            </div>
            @endif

            @if ($card->music)
            <div class="mb-4">
                <audio controls class="w-full">
                    <source src="{{ asset('storage/' . $card->music) }}">
                    Ton navigateur ne supporte pas la lecture audio.
                </audio>
            </div>
            @endif

            @if ($card->video)
            <div class="mb-4">
                <video controls class="w-full max-w-md">
                    <source src="{{ asset('storage/' . $card->video) }}">
                    Ton navigateur ne supporte pas la lecture vidéo.
                </video>
            </div>
            @endif
            <div class="bg-white shadow p-4 rounded mb-4">
                <h3 class="text-lg font-bold">{{ $card->title }}</h3>
                <p>{{ $card->description }}</p>

                <div class="mt-2 flex space-x-2">
                    <a href="{{ route('cards.edit', $card->id) }}" class="text-blue-600 hover:underline">Modifier</a>

                    <form action="{{ route('cards.destroy', $card->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p class="text-gray-600">Aucune carte enregistrée.</p>
        @endforelse
    </div>
</x-app-layout>