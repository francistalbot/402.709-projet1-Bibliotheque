@extends('layouts.app')

@section('title', 'Ajouter un categorie')

@section('content')
    <h2>Ajouter une Nouvelle Catégorie</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <button type="submit">Ajouter la Catégorie</button>
    </form>
@endsection