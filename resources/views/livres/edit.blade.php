@extends('layouts.app')

@section('title', 'Modifier le Livre')

@section('content')
    <div class="py-1 py-md-3">
        <h2>Modifier le Livre</h2>
    </div>
    <hr>
    <!-- Formulaire pour modifier un livre -->
    <form action="{{ route('livres.update', ['livre' => $livre->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 text-start w-lg-50 m-auto">
            <div class="form-group mb-3 ">
                <label for="titre">Titre:</label>
                <input class="form-control" type="text" id="titre" name="titre"
                    value="{{ old('titre', $livre->titre) }}" required>
                @error('titre')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="auteur_id">Auteur:</label>
                        <select class="form-control" id="auteur_id" name="auteur_id" required>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}"
                                    {{ old('auteur_id', $livre->auteur_id) == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('auteur_id')
                            <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="categorie_id">Catégorie:</label>
                        <select class="form-control" id="categorie_id" name="categorie_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('categorie_id', $livre->categorie_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('categorie_id')
                            <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="publication_annee">Année de Publication:</label>
                        <input class="form-control" type="number" id="publication_annee" name="publication_annee"
                            value="{{ old('publication_annee', $livre->publication_annee) }}" required>
                        @error('publication_annee')
                            <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="prix">Prix:</label>
                        <input class="form-control" type="number" step="0.01" id="prix" name="prix"
                            value="{{ old('prix', $livre->prix) }}" required>
                        @error('prix')
                            <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="isbn">ISBN:</label>
                <input class="form-control" type="text" id="isbn" name="isbn"
                    value="{{ old('isbn', $livre->isbn) }}" required>
                @error('isbn')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="resume">Résumé:</label>
                <textarea class="form-control" id="resume" name="resume" required>{{ old('resume', $livre->resume) }}</textarea>
                @error('resume')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="promo">En Promotion:</label>
                <select class="form-control" id="promo" name="promo" required>
                    <option value="0" {{ old('promo', $livre->promo) == 0 ? 'selected' : '' }}>Non</option>
                    <option value="1" {{ old('promo', $livre->promo) == 1 ? 'selected' : '' }}>Oui</option>
                </select>
                @error('promo')
                    <div style="color: red;">{{ $message }}</div>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour le Livre</button>
    </form>
    <div class="text-start">
        <a href="{{ route('livres.index') }}">Retour à la liste des livres</a>
    </div>
@endsection
