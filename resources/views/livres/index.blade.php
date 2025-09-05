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
    <div class="mb-3 row ">
        <div class="col text-md-start mb-3 mb-md-0">
            <a href="{{ route('livres.create') }}" class="btn btn-primary col">Ajouter un Livre</a>
        </div>
        <div class="col grow-1 d-flex justify-content-end">   
            <form class="d-flex align-items-center gap-2 w-50 " style="min-width: 500px;">
                <input type="text" class="form-control " placeholder="Rechercher un livre par titre, catégorie, auteur ou année...">
                <button class="btn btn-outline-secondary">Rechercher</button>
            </form>
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
                    <div class="card-body">
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