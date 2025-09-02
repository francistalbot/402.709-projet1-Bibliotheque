@extends('layouts.app')

@section('title', 'Liste des Auteurs')

@section('content')
    <h2>Liste des Auteurs</h2>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <a href="{{ route('authors.create') }}">Ajouter un Auteur</a>
    <ul>
        @foreach($authors as $author)
            <li>{{ $author->name }} - {{ $author->biography }}</li>
        @endforeach
    </ul>
@endsection