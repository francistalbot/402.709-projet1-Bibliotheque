@extends('layouts.app')

@section('title', 'Ajouter un Livre')

@section('content')
    <h2>Ajouter un Nouveau Livre</h2>
    <form action="{{ route('livres.store') }}" method="POST">
        @csrf
        <div>
            <label for="titre">Titre:</label>
            <input type="text" id="titre" name="titre" required>
        </div>
        <div>
            <label for="resume">Résumé:</label>
            <textarea id="resume" name="resume" required></textarea>
        </div>
        <div >
            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" required>
        </div>
        <div>
            <label for="auteur_id">Auteur:</label>
            <select id="auteur_id" name="auteur_id" required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>   
        </div>
        <div>
            <label for="categorie_id">Catégorie:</label>
            <select id="categorie_id" name="categorie_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>   
        </div>

        <div>
            <label for="publication_annee">Année de Publication:</label>
            <input type="number" id="publication_annee" name="publication_annee" required>
        </div>
        <div>
            <label for="prix">Prix:</label>
            <input type="number" step="0.01" id="prix" name="prix" required>
        </div>
        <button type="submit">Ajouter le Livre</button>
    </form>
@endsection
