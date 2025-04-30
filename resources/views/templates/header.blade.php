<div class="container mx-auto px-4 py-3 flex flex-wrap items-center justify-between">
    <a href="{{ url('/') }}" class="text-xl font-semibold text-white">Accueil</a>

    <button class="text-white md:hidden" @click="open = !open" x-data="{ open: false }" aria-label="Menu">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <div class="w-full md:flex md:items-center md:w-auto" :class="{ 'block': open, 'hidden': !open }" x-show="open || window.innerWidth >= 768">
        <ul class="flex flex-col md:flex-row md:space-x-6 mt-4 md:mt-0">
            <li><a href="{{ route('vignettes.index') }}" class="block py-2 text-white hover:text-gray-300">Liste des Vignettes</a></li>
            <li><a href="{{ route('vignettes.create') }}" class="block py-2 text-white hover:text-gray-300">Créer une Vignette</a></li>
        </ul>
        <ul class="flex flex-col md:flex-row md:space-x-6 mt-4 md:mt-0 md:ml-auto">
            @guest
                @if (Route::has('login'))
                    <li><a href="{{ route('login') }}" class="block py-2 text-white hover:text-gray-300">Se connecter</a></li>
                @endif
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="block py-2 text-white hover:text-gray-300">S'inscrire</a></li>
                @endif
            @else
                <li class="relative" x-data="{ dropdown: false }">
                    <button @click="dropdown = !dropdown" class="flex items-center py-2 text-white hover:text-gray-300">
                        {{ Auth::user()->name }}
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414L10 13.414l-4.707-4.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div x-show="dropdown" @click.away="dropdown = false"
                         class="absolute right-0 mt-2 w-48 bg-white text-black rounded-md shadow-lg z-10">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="block px-4 py-2 hover:bg-gray-100">Déconnexion</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</div>
