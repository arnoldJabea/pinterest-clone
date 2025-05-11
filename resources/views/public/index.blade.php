<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Explorer les cartes') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto">
        <!-- Filtres -->
        <form method="GET" action="{{ route('explore') }}" class="mb-6 flex flex-wrap gap-4">
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <select name="category_id" id="category_id" class="border rounded p-2">
                    <option value="">-- Toutes --</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="size_id" class="block text-sm font-medium text-gray-700">Taille</label>
                <select name="size_id" id="size_id" class="border rounded p-2">
                    <option value="">-- Toutes --</option>
                    @foreach($sizes as $size)
                    <option value="{{ $size->id }}" {{ request('size_id') == $size->id ? 'selected' : '' }}>
                        {{ $size->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Filtrer</button>
                <a href="{{ route('explore') }}" class="ml-2 text-sm text-gray-600 hover:text-red-600">
                    Réinitialiser les filtres
                </a>
            </div>
        </form>

        <!-- Cartes -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($cards as $card)
            <div class="bg-white shadow rounded p-4">
                <h3 class="text-xl font-bold mb-2">{{ $card->title }}</h3>
                <p class="mb-3">{{ $card->description }}</p>

                @if($card->image)
                <img src="{{ asset('storage/' . $card->image) }}" class="mb-3 w-full rounded">
                @endif

                @if($card->music)
                <audio controls class="w-full mb-3">
                    <source src="{{ asset('storage/' . $card->music) }}">
                    Ton navigateur ne supporte pas l'audio.
                </audio>
                @endif

                @if($card->video)
                <video controls class="w-full max-h-64 rounded">
                    <source src="{{ asset('storage/' . $card->video) }}">
                    Ton navigateur ne supporte pas la vidéo.
                </video>
                @endif
            </div>
            @empty
            <p class="text-gray-500 col-span-2">Aucune carte disponible.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>