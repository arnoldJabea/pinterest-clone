<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la carte') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto p-6 bg-white shadow rounded">
            <form method="POST" action="{{ route('cards.update', $card->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium">Titre</label>
                    <input type="text" name="title" value="{{ old('title', $card->title) }}" class="w-full border p-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Description</label>
                    <textarea name="description" class="w-full border p-2 rounded">{{ old('description', $card->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Image</label>
                    <input type="file" name="image" class="w-full">
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Musique</label>
                    <input type="file" name="music" class="w-full">
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Vidéo</label>
                    <input type="file" name="video" class="w-full">
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Taille</label>
                    <select name="card_size_id" class="w-full border p-2 rounded" required>
                        @foreach($sizes as $size)
                            <option value="{{ $size->id }}" {{ $card->card_size_id == $size->id ? 'selected' : '' }}>{{ $size->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Catégorie</label>
                    <select name="category_id" class="w-full border p-2 rounded" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $card->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Mettre à jour</button>
            </form>
        </div>
    </div>
</x-app-layout>