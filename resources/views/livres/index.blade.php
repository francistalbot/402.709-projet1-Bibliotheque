@extends('layouts.app')

@section('title', 'Liste des Livres')

@section('content')
    <h2>Liste des Livres</h2>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <a href="{{ route('livres.create') }}">Ajouter un Livre</a>
    <ul>
        @foreach($livres as $livre)
            <li>
                <a href="{{ route('livres.show',['livre' => $livre->id]) }}"> <strong>{{ $livre->titre }}</strong></a> par <a href="{{ route('authors.show',['author' => $livre->auteur->id]) }}">{{ $livre->auteur->name }}</a> dans la catégorie <a href="{{ route('categories.show',['category' => $livre->categorie->id]) }}">{{ $livre->categorie->name }}</a>
            </li>

        @endforeach
    </ul>
@endsection