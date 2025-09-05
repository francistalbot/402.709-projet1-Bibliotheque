@extends('layouts.app')

@section('title', 'Nouveautés')

@section('content')
    <div class="py-1 py-md-3">
    <h2>Nouveautés</h2>
    </div>
    <hr>
    <p>Découvrez les dernières acquisitions de la Bibliothèque à Livres.</p>
    <div class="row gx-3 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center">
    
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
@endsection
