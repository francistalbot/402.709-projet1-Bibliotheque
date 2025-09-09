@extends('layouts.app')

@section('title', 'Ajouter un Livre')

@section('content')
    <div class="py-1 py-md-3">
    <h2>Ajouter un Nouveau Livre</h2>
    </div>
    <hr>
    <!-- Formulaire pour ajouter un nouveau livre -->
    <form action="{{ route('livres.store') }}" method="POST">
        @csrf
        <div class="mb-3 text-start w-lg-50 m-auto">
            <div class="form-group mb-3 ">
                <label for="titre">Titre:</label>
                <input  class="form-control" type="text" id="titre" name="titre"  value="{{ old('titre') }}" required>
            </div>
            @error('titre')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="auteur_id">Auteur:</label>
                        <select  class="form-control" id="auteur_id" name="auteur_id" required>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}"  {{ (old('auteur_id') == $author->id) ? 'selected' : '' }}>{{ $author->name }}</option>
                            @endforeach
                        </select>   
                    </div>
                </div>
                @error('auteur_id')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="categorie_id">Catégorie:</label>
                        <select  class="form-control" id="categorie_id" name="categorie_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('categorie_id') == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>   
                    </div> 
                </div>
                @error('categorie_id')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="publication_annee">Année de Publication:</label>
                        <input  class="form-control" type="number"  value="{{ old('publication_annee') }}"  id="publication_annee" name="publication_annee" required>
                    </div>
                </div>
                @error('publication_annee')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
                <div class="col-md-6">
                <label for="prix">Prix:</label>
                <input  class="form-control" type="number" step="0.01" id="prix" value="{{ old('prix') }}"  name="prix" required>
                </div>
                @error('prix')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="isbn">ISBN:</label>
                <input  class="form-control" type="text" id="isbn" value="{{ old('isbn') }}"  name="isbn" required>
            </div>
            @error('isbn')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            
            <div class="form-group">
                <label for="resume">Résumé:</label>
                <textarea  class="form-control" id="resume" value="{{ old('resume') }}"  name="resume" required></textarea>
            </div>
            @error('resume')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            </div>
        <button type="submit" class="btn btn-primary">Ajouter le Livre</button>
    </form>
@endsection
