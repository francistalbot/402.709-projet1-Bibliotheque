@extends('layouts.app')

@section('title', 'Modifier le Livre')

@section('content')
    <h2>Modifier le Livre</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
            <label for="categorie_id">Auteur:</label>
            <select id="auteur_id" name="auteur_id" >
                <option value="">-- Sélectionner un auteur --</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ (old('auteur_id', $livre->auteur_id) == $author->id) ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
            <input type="text" id="new_author" name="new_author" value="{{ old('new_author') }}" placeholder="Ou ajouter un nouvel auteur">  
            @error('categorie_id')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="categorie_id">Catégorie:</label>
            <select id="categorie_id" name="categorie_id">
                <option value="">-- Sélectionner une catégorie --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('categorie_id', $livre->categorie_id) == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <input type="text" id="new_category" name="new_category" value="{{ old('new_category') }}" placeholder="Ou ajouter une nouvelle catégorie">
            @error('categorie_id')
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
