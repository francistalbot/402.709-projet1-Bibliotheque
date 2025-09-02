@extends('layouts.app')

@section('title', 'Details du Livre')

@section('content')
    <h2>Détails du Livre</h2>
    <a href="{{ route('livres.edit',['livre' => $livre->id]) }}">Éditer le Livre</a>
    <form action="{{ route('livres.destroy',['livre' => $livre->id]) }}"
            method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">Supprimer le Livre</button>  
    </form>
    <hr>
    <div>
        <strong>Titre:</strong> {{ $livre->titre }}
    </div>
    <div>
        <strong>Auteur:</strong> {{ $livre->auteur->name }}
    </div>
    <div>
        <strong>Catégorie:</strong> {{ $livre->categorie->name }}
    </div>
    <div>
        <strong>Année de Publication:</strong> {{ $livre->publication_annee }}
    </div>
    <div>
        <strong>ISBN:</strong> {{ $livre->isbn }}
    </div>
    <div>
        <strong>Résumé:</strong> {{ $livre->resume }}
    </div>
    <div>
        <strong>Prix:</strong> {{ $livre->prix }}$
    </div>
    <a href="{{ route('livres.index') }}">Retour à la liste des livres</a>

@endsection