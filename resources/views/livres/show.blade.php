@extends('layouts.app')

@section('title', 'Details du Livre')

@section('content')
    <div class="py-1 py-md-3">
        <h2>Détails du Livre</h2>
    </div>
    <hr>
    <div class="mb-3 row ">
        <div class="col  mb-3 mb-md-0">
            <a class="col btn btn-primary" href="{{ route('livres.edit',['livre' => $livre->id]) }}">Éditer le Livre</a>
        </div>
        <form class="col " action="{{ route('livres.destroy',['livre' => $livre->id]) }}"
                method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">Supprimer le Livre</button>
        </form>
    </div>
    <div class="m-3 px-5 pb-5 border bg-white w-50 mx-auto text-start">
        <div class="mx-3  text-start">
            <div class="m-3">
                <div class="w-fit bg-dark bg-opacity-75 rounded text-white p-2">
                 Science-fiction</div>
            </div>
            <div class="mb-3">
                <h1 class="mb-0 mx-3">
                    <strong>{{ $livre->titre }}</strong> 
                </h1>
                <div class="mb-2 text-muted mx-3">
                    <small>ISBN {{ $livre->isbn }}</small>
                </div>
            </div>
            <div class="m-3 ">

                 <h4 class="fst-italic fw-bold">{{ $livre->prix }}$</h4>
            </div>   
            <div class="row">
                <div class=" col">
                    <strong>Auteur:</strong> {{ $livre->auteur->name }}
                </div>
                <div class=" col">
                    <strong>Année:</strong> {{ $livre->publication_annee }}
                </div>    
                <div class="mb-2">
                    <strong>Résumé:</strong> 
                    <blockquote class="blockquote mx-5 text-break fst-italic fw-light display-1" style="
                        -webkit-line-clamp: 5;
                        display: -webkit-box;
                        -webkit-box-orient: vertical;
                        overflow: hidden;">
                        <small> {{ $livre->resume }}</small>
                    </blockquote>
                </div>
            </div>
            
        </div>
         <a class="btn btn-outline-primary" href="{{ route('livres.edit',['livre' => $livre->id]) }}">Ajouter au panier</a>
                    
    </div>
    <div class="text-start">
        <a  href="{{ route('livres.index') }}">Retour à la liste des livres</a>
    </div>

@endsection