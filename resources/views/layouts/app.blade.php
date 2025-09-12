<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    @stack('head')
    @vite([
        'resources/sass/app.scss',
        'resources/js/app.js',
        'resources/css/styles.css',
    ])
</head>
<body>
    <header>
        @include('partials.menu')
    </header>

    <main class="bg-light py-5 text-center" style="height: calc(100vh - 73px - 120px); overflow-y: auto;">
        <div class="container">
            @yield('content')
        </div>
    </main>

<!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">
        <small>&copy; {{ date('Y') }} Projet 1 – Bibliothèque à Livres</small></p></div>
        </footer>
 
    @stack('scripts')
</body>
</html>
