@extends('layouts.app')

@section('title', 'Ajouter un auteur')

@section('content')
    <h2>Ajouter un Nouvel Auteur</h2>
    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="biography">Biographie:</label>
            <textarea id="biography" name="biography" required></textarea>
        </div>
        <button type="submit">Ajouter l'Auteur</button>
    </form>
@endsection