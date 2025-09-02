@extends('layouts.app')

@section('title', 'Modifier la Catégorie')

@section('content')
    <h2>Modifier la Catégorie</h2>
    <form action="{{ route('categories.update', ['category' => $categorie->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $categorie->name) }}" required>
            @error('name')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Mettre à jour la Catégorie</button>
    </form>
    <a href="{{ route('categories.index') }}">Retour à la liste des catégories</a>
@endsection