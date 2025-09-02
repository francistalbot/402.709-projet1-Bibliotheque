@extends('layouts.app')

@section('title', 'Modifier le Livre')

@section('content')
    <h2>Modifier le Livre</h2>
    <form action="{{ route('livres.update', ['livre' => $livre->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="titre">Titre:</label>
            <input type="text" id="titre" name="titre" value="{{ old('titre', $livre->titre) }}" required>
            @error('titre')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="resume">Résumé:</label>
            <textarea id="resume" name="resume" required>{{ old('resume', $livre->resume) }}</textarea>
            @error('resume')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" value="{{ old('isbn', $livre->isbn) }}" required>
            @error('isbn')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="author_id">Auteur:</label>
            <select id="author_id" name="author_id" required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ (old('author_id', $livre->author_id) == $author->id) ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
            @error('author_id')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="category_id">Catégorie:</label>
            <select id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $livre->category_id) == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="publication_annee">Année de Publication:</label>
            <input type="number" id="publication_annee" name="publication_annee" value="{{ old('publication_annee', $livre->publication_annee) }}" required>
            @error('publication_annee')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="prix">Prix:</label>
            <input type="number" step="0.01" id="prix" name="prix" value="{{ old('prix', $livre->prix) }}" required>
            @error('prix')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit">Mettre à jour le Livre</button>
    </form>
    <a href="{{ route('livres.index') }}">Retour à la liste des livres</a>
@endsection 
