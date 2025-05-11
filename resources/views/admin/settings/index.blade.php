<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Paramètres du site') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.settings.update') }}" class="bg-white p-6 rounded shadow space-y-4">
            @csrf
            
       

            <!-- Thème -->
            <div>
                <label for="theme" class="block text-sm font-medium text-gray-700">Thème</label>
                <select name="theme" id="theme" class="border rounded p-2 w-full">
                    <option value="BLANC" {{ $setting->theme === 'BLANC' ? 'selected' : '' }}>Blanc</option>
                    <option value="NOIR" {{ $setting->theme === 'NOIR' ? 'selected' : '' }}>Noir</option>
                    <option value="IMAGE" {{ $setting->theme === 'IMAGE' ? 'selected' : '' }}>Image personnalisée</option>
                </select>
            </div>

            <!-- Opacité -->
            <div>
                <label for="opacity" class="block text-sm font-medium text-gray-700">Opacité (%)</label>
                <input type="number" name="opacity" id="opacity" min="0" max="1" step="0.01" value="{{ $setting->opacity }}" class="border rounded p-2 w-full">
                <p class="text-sm text-gray-500">Exemple : 0.5 = 50% de transparence</p>
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Enregistrer</button>
            </div>
        </form>
    </div>
</x-app-layout>