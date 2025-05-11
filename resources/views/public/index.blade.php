<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Explorer les cartes') }}
        </h2>
    </x-slot>

    @php
        $themeClass = match(optional($setting)->theme) {
            'dark' => 'bg-black text-white',
            'image' => 'bg-cover bg-center text-white',
            default => 'bg-white text-black',
        };

        $bgStyle = optional($setting)->theme === 'image'
            ? "background-image: url('/images/bg.jpg'); opacity: " . (optional($setting)->opacity / 100) . ";"
            : "opacity: " . (optional($setting)->opacity / 100) . ";";
    @endphp


    <div class="py-6 max-w-6xl mx-auto {{ $themeClass }}" style="{{ $bgStyle }}">
        <!-- Filtres -->
        <form method="GET" action="{{ route('explore') }}" class="mb-6 flex flex-wrap gap-4">
            <!-- ... (inchangé) -->
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
                    </audio>
                    @endif

                    @if($card->video)
                    <video controls class="w-full max-h-64 rounded">
                        <source src="{{ asset('storage/' . $card->video) }}">
                    </video>
                    @endif
                </div>
            @empty
            <p class="text-gray-500 col-span-2">Aucune carte disponible.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
