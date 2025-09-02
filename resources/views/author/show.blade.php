@extends('layouts.app')

@section('title', 'Details du Auteur')

@section('content')
    <h2>Détails de l'Auteur</h2>
    <div>
        <strong>Nom:</strong> {{ $author->name }}
    </div>
    <div>
        <strong>Biographie:</strong> {{ $author->biography }}
    </div>
    <a href="{{ route('authors.index') }}">Retour à la liste des auteurs</a>
    <h3>Livres de cet Auteur</h3>
    <ul>
        @foreach($author->livres as $livre)
            <li>
                <a href="{{ route('livres.show',['livre' => $livre->id]) }}"> <strong>{{ $livre->titre }}</strong></a> 
            </li>
        @endforeach
    </ul>
@endsection
