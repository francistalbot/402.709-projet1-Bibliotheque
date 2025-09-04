@extends('layouts.app')

@section('title', 'Nouveautés')

@section('content')
    <h2>Nouveautés</h2>
    <p>Découvrez les dernières acquisitions de la Bibliothèque à Livres.</p>
    <ul>
        @foreach($livres as $livre)
            <li>
                <a href="{{ route('livres.show',['livre' => $livre->id]) }}"> <strong>{{ $livre->titre }}</strong></a> par <a href="{{ route('authors.show',['author' => $livre->auteur->id]) }}">{{ $livre->auteur->name }}</a> dans la catégorie <a href="{{ route('categories.show',['category' => $livre->categorie->id]) }}">{{ $livre->categorie->name }}</a>
            </li>

        @endforeach
    </ul>
@endsection
