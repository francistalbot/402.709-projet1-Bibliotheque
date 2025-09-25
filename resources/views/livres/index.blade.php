@extends('layouts.app')

@section('title', 'Liste des Livres')

@section('content')
    <div class="py-1 py-md-3">
    <h2>Liste des Livres</h2>
    </div>
    <hr>
    <!-- Affichage des messages de succès -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <!-- Menu des livres -->
    <form class="" action="{{ route('livres.index') }}" method="GET" style="min-width: 500px;">
            
        <div class="mb-3 row ">
            <div class="col grow-1 d-flex justify-content-start">   
                <div class="d-flex align-items-center gap-2 w-50 " action="{{ route('livres.index') }}" method="GET" style="min-width: 500px;">
                    <button class="btn btn-outline-secondary">Rechercher</button>
                    <input type="text" name="search" value="{{ request('search') }}"  class="form-control " placeholder="Rechercher un livre par titre">

                </div>
            </div>
                <!-- Recherche avancée -->
        <div class="card mb-4 p-0 border-0">
            <div class="card-header bg-light border-0">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#advancedSearch">
                        Recherche avancée
                    </button>
                </h5>
            </div>
            
            <div id="advancedSearch" class="collapse {{ request()->hasAny(['search', 'author', 'annee_min', 'annee_max', 'prix_min', 'prix_max', 'category']) ? 'show' : '' }}">
                <div class="card-body border border-1 rounded-3">
                    <form action="{{ route('livres.index') }}" method="GET">
                        <div class="row g-3">
                            <!-- Filtre par auteur -->
                            <div class="col-md-6 m-0 ">
                                <label for="author" class="form-label">Auteur</label>
                                <select class="form-select" id="author" name="author">
                                    <option value="">Tous les auteurs</option>
                            
                                </select>
                            </div>
                            
                            <!-- Filtre par catégorie -->
                            <div class="col-md-6 m-0">
                                <label for="category" class="form-label">Catégorie</label>
                                <select class="form-select" id="category" name="category">
                                    <option value="">Toutes les catégories</option>
                    
                                </select>
                            </div>
                            
                            <!-- Année de publication -->
                            <div class="col-md-6">
                                <label class="form-label">Année de publication</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="form-control" name="annee_min" 
                                            value="{{ request('annee_min') }}" placeholder="De" min="1500" max="{{ date('Y') }}">
                                    </div>
                                    <div class="col-auto align-self-center">à</div>
                                    <div class="col">
                                        <input type="number" class="form-control" name="annee_max" 
                                            value="{{ request('annee_max') }}" placeholder="À" min="1500" max="{{ date('Y') }}">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Plage de prix -->
                            <div class="col-md-6">
                                <label class="form-label">Prix (CAD)</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="form-control" name="prix_min" 
                                            value="{{ request('prix_min') }}" placeholder="Prix min" min="0" step="0.01">
                                    </div>
                                    <div class="col-auto align-self-center">à</div>
                                    <div class="col">
                                        <input type="number" class="form-control" name="prix_max" 
                                            value="{{ request('prix_max') }}" placeholder="Prix max" min="0" step="0.01">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Rechercher</button>
                                <a href="{{ route('livres.index') }}" class="btn btn-outline-secondary">Réinitialiser</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>

    <!-- Menu des livres -->
    <div class="mb-3 d-flex justify-content-between align-items-center">
        @auth
            @if(Auth::user()->isAdmin())
                <a href="{{ route('livres.create') }}" class="btn btn-primary">Ajouter un Livre</a>
            @endif
        @endauth
    @if(request()->hasAny(['search', 'author', 'annee_min', 'annee_max', 'prix_min', 'prix_max', 'category']))
        <div class="alert alert-info">
            {{ $livres->count() }} livre(s) trouvé(s) selon vos critères
        </div>
    @endif
    </div>

    </div>
    <div class="row gx-3 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-left">
    
        @foreach($livres as $livre)
            <div class="col mb-5 cursor-pointer" href="{{ route('livres.show',['livre' => $livre->id]) }}">
                <div class="card ">
                    <div class="card-header bg-info bg-opacity-10">
                        <h5 class="card-title">
                            <a class="card-link " href="{{ route('livres.show',['livre' => $livre->id]) }}"> {{ $livre->titre }}</a>
                        </h5></div>
                    <div class="card-body position-relative">
                    @if($livre->created_at >= now()->subDays(10))
                        <span class="badge bg-warning position-absolute" style="top: 10px; right: 10px;">Nouveauté</span>
                    @endif
                    <div class="row mb-3">
                            <div class="col ">
                                <div>Auteur: <a class="card-link" href="{{ route('authors.show',['author' => $livre->auteur->id]) }}">{{ $livre->auteur->name }}</a></div>
                                <div>Catégorie: <a class="card-link " href="{{ route('categories.show',['category' => $livre->categorie->id]) }}">{{ $livre->categorie->name }}</a></div>
                                <div>Année de publication: {{ $livre->publication_annee }}</div>
                                <div>Prix: {{ $livre->prix }} $</div>
                            </div>
                        </div>
                        <a class="btn btn-outline-primary" href="{{ route('livres.edit',['livre' => $livre->id]) }}">Ajouter au panier</a>
                    
                    </div>
                </div>
            </div>

        @endforeach
    </div>
    </div>
@endsection