<nav class="bg-gray-900 text-white px-4 py-3">
    <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between">
        <a href="{{ url('/') }}" class="text-xl font-semibold">Accueil</a>

        <button class="text-white lg:hidden" onclick="document.getElementById('navbarNav').classList.toggle('hidden')">
            <!-- Hamburger Icon -->
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <div id="navbarNav" class="w-full lg:flex lg:items-center lg:w-auto hidden">
            <ul class="flex flex-col lg:flex-row lg:space-x-6 mt-4 lg:mt-0">
                <li><a href="{{ route('vignettes.index') }}" class="hover:text-gray-300">Liste des Vignettes</a></li>
                <li><a href="{{ route('vignettes.create') }}" class="hover:text-gray-300">Créer une Vignette</a></li>
            </ul>

            <ul class="flex flex-col lg:flex-row lg:space-x-4 mt-4 lg:mt-0 lg:ml-auto">
                @guest
                    @if (Route::has('login'))
                        <li><a href="{{ route('login') }}" class="hover:text-gray-300">Se connecter</a></li>
                    @endif
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="hover:text-gray-300">S'inscrire</a></li>
                    @endif
                @else
                    <li class="relative group">
                        <button class="hover:text-gray-300 flex items-center gap-2">
                            {{ Auth::user()->name }}
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M5.23 7.21a.75.75 0 011.06.02L10 11.584l3.71-4.354a.75.75 0 111.14.976l-4.25 5a.75.75 0 01-1.14 0l-4.25-5a.75.75 0 01.02-1.06z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <ul
                            class="absolute right-0 mt-2 w-40 bg-white text-gray-800 rounded shadow-lg hidden group-hover:block">
                            <li>
                                <a href="{{ route('logout') }}"
                                   class="block px-4 py-2 hover:bg-gray-100"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Déconnexion
                                </a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
