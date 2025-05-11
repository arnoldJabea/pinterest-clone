<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des utilisateurs') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto space-y-4">
        @foreach ($users as $user)
            <div class="bg-white shadow p-4 rounded flex justify-between items-center">
                <div>
                    <p class="font-bold">{{ $user->name }}</p>
                    <p class="text-sm text-gray-600">{{ $user->email }}</p>
                    <p class="text-sm">
                        Rôle : <span class="font-medium">{{ $user->role }}</span>
                        | Statut : 
                        <span class="{{ $user->active ? 'text-green-600' : 'text-red-600' }}">
                            {{ $user->active ? 'Actif' : 'Désactivé' }}
                        </span>
                    </p>
                </div>

                <div class="flex gap-2">
                    <!-- Changer de rôle -->
                    <form method="POST" action="{{ route('admin.users.toggleRole', $user->id) }}">
                        @csrf
                        @method('PATCH')
                        <button class="text-blue-600 hover:underline text-sm">Changer rôle</button>
                    </form>

                    <!-- Activer / Désactiver -->
                    <form method="POST" action="{{ route('admin.users.toggleActive', $user->id) }}">
                        @csrf
                        @method('PATCH')
                        <button class="text-red-600 hover:underline text-sm">
                            {{ $user->active ? 'Désactiver' : 'Activer' }}
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>