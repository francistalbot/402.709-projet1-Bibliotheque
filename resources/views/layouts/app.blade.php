<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Mon Site Laravel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('head')
    @vite([
    "resources/js/app.js",
])
</head>
<body>
    <header>
        <h1>Projet 1 – Bibliothèque à Livres</h1>
        @include('partials.menu')
        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <hr>
    <footer>
        <small>&copy; {{ date('Y') }} Projet 1 – Bibliothèque à Livres</small>
    </footer>

    @stack('scripts')
</body>
</html>
