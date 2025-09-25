

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}"> {{ config('app.name', 'Bibliothèque') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('home') }}">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contactez-nous</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('nouveautes') }}">Nouveautés</a></li>
                        @auth
                            @if(Auth::user()->isAdmin())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                        Administration
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('livres.create') }}">Ajouter un livre</a></li>
                                        <li><a class="dropdown-item" href="{{ route('authors.index') }}">Gérer les auteurs</a></li>
                                        <li><a class="dropdown-item" href="{{ route('categories.index') }}">Gérer les catégories</a></li>
                                        <li><a class="dropdown-item" href="{{ route('messages.index') }}">Messages</a></li>
                                        <li><a class="dropdown-item" href="#">Gérer les coupons</a></li>
                                        <li><a class="dropdown-item" href="{{ route('stripe.payments') }}">Historique des paiement</a></li>
                                    </ul>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('password.change') }}">{{ __('Change Password') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @auth
                            @if(!Auth::user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart') }}">
                                    Panier 
                                    <span class="badge bg-secondary">
                                        {{ \Cart::getTotalQuantity() }}
                                    </span>
                                </a>
                            </li>
                            @endif
                            @endauth
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>