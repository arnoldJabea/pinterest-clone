<div class="container-fluid">
  <a class="navbar-brand" href="{{ url('/') }}">Accueil</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('vignettes.index') }}">Liste des Vignettes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('vignettes.create') }}">Créer une Vignette</a>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto">
      @guest
        @if (Route::has('login'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
          </li>
        @endif
        @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
          </li>
        @endif
      @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Déconnexion
              </a>
            </li>
          </ul>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      @endguest
    </ul>
  </div>
</div>
