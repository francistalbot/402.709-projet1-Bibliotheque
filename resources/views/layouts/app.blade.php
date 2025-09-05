<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Mon Site Laravel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    @stack('head')
    @vite([
    "resources/js/app.js",
    "resources/css/styles.css",
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
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        
    @stack('scripts')
</body>
</html>
