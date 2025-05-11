<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modération des cartes') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto space-y-6">
        <!-- Filtres -->
        <form method="GET" action="{{ route('admin.cards.index') }}" class="flex flex-wrap items-center gap-4 mb-6">
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <select name="category_id" id="category_id" class="border rounded p-2">
                    <option value="">-- Toutes --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="user_id" class="block text-sm font-medium text-gray-700">Utilisateur</label>
                <select name="user_id" id="user_id" class="border rounded p-2">
                    <option value="">-- Tous --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="self-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filtrer</button>
            </div>
        </form>

        <!-- Liste des cartes -->
        @foreach ($cards as $card)
            <div class="bg-white shadow-md rounded p-4 space-y-2">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold">{{ $card->title }}</h3>
                        <p class="text-sm text-gray-600">
                            Par : {{ $card->user->name }} |
                            Catégorie : {{ $card->category->name }}
                        </p>
                    </div>

                    <form action="{{ route('admin.cards.destroy', $card->id) }}" method="POST" onsubmit="return confirm('Confirmer la désactivation ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Désactiver</button>
                    </form>
                </div>

                @if ($card->image)
                    <img src="{{ asset('storage/' . $card->image) }}" alt="Image" class="w-32 border rounded">
                @endif

                <!-- Redimensionnement -->
                <form action="{{ route('admin.cards.resize', $card->id) }}" method="POST" class="flex items-center space-x-2 mt-2">
                    @csrf
                    @method('PATCH')

                    <label for="card_size_id_{{ $card->id }}">Taille :</label>
                    <select name="card_size_id" id="card_size_id_{{ $card->id }}" class="border rounded p-1">
                        @foreach ($sizes as $size)
                            <option value="{{ $size->id }}" {{ $card->card_size_id == $size->id ? 'selected' : '' }}>
                                {{ $size->name }} ({{ $size->width }}x{{ $size->height }})
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Mettre à jour</button>
                </form>
            </div>
        @endforeach
    </div>
</x-app-layout>