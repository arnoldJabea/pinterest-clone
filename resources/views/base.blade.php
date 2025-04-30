<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Vignette'))</title>
    <!-- CSRF Token -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    @vite('resources/sass/app.scss')
</head>

<body>
    <nav class="bg-gray-900 text-white">
        @include('templates/header')
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <footer class="bg-dark text-center text-white py-3 mt-5">
        @include('templates/footer')
    </footer>
</body>
<script src="//unpkg.com/alpinejs" defer></script>
</html>
