@extends('layouts.app')

@section('title', 'Detail de la Catégorie')

@section('content')
    <h2>Détails de la Catégorie</h2>
    <div>
        <strong>Nom:</strong> {{ $categorie->name }}
    </div>
    <a href="{{ route('categories.index') }}">Retour à la liste des catégories</a>
    <a href="{{ route('categories.edit',['category' => $categorie->id]) }}">Éditer la Catégorie</a>
    <form action="{{ route('categories.destroy',['category' => $categorie->id]) }}"
            method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">Supprimer la Catégorie</button>  
    </form>
    
    <h3>Livres dans cette Catégorie</h3>
    <ul>
        @foreach($categorie->livres as $livre)
            <li>
                <a href="{{ route('livres.show',['livre' => $livre->id]) }}"> <strong>{{ $livre->titre }}</strong></a> 
            </li>
        @endforeach
    </ul>
@endsection