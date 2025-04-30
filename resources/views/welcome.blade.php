<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AROOL</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            body {
                font-family: 'Instrument Sans', sans-serif;
                background-color: #FDFDFC;
                color: #1b1b18;
                margin: 0;
                padding: 2rem;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                flex-direction: column;
            }
            h1 {
                font-size: 3rem;
                font-weight: 600;
                margin-bottom: 1rem;
            }
            a {
                text-decoration: none;
                color: #f53003;
                font-weight: 500;
                margin: 0 0.5rem;
            }
        </style>
    @endif
</head>
<body class="antialiased">
    <header>
        @if (Route::has('login'))
            <nav>
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Connexion</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Inscription</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main>
        <h1>AROOL</h1>
        <p>Bienvenue sur notre application Laravel.</p>
    </main>
</body>
</html>
