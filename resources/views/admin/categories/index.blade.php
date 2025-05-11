<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des catégories') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto space-y-6">
        <!-- Formulaire d'ajout -->
        <form method="POST" action="{{ route('admin.categories.store') }}" class="bg-white p-4 rounded shadow">
            @csrf
            <div class="flex items-center space-x-2">
                <input type="text" name="name" placeholder="Nom de la catégorie" class="border rounded p-2 w-full" required>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Ajouter</button>
            </div>
        </form>

        <!-- Liste des catégories -->
        @foreach($categories as $category)
            <div class="bg-white p-4 rounded shadow flex justify-between items-center">
                <span>{{ $category->name }}</span>
                <div class="flex items-center space-x-2">
                    <!-- Formulaire de modification -->
                    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" value="{{ $category->name }}" class="border rounded p-1">
                        <button class="text-blue-600 hover:underline">Modifier</button>
                    </form>

                    <!-- Formulaire de suppression -->
                    <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}" onsubmit="return confirm('Confirmer la suppression ?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>