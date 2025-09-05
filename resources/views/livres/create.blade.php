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
                <input  class="form-control" type="text" id="titre" name="titre" required>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="auteur_id">Auteur:</label>
                        <select  class="form-control" id="auteur_id" name="auteur_id" required>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>   
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="categorie_id">Catégorie:</label>
                        <select  class="form-control" id="categorie_id" name="categorie_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>   
                    </div> 
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="publication_annee">Année de Publication:</label>
                        <input  class="form-control" type="number" id="publication_annee" name="publication_annee" required>
                    </div>
                </div>
                <div class="col-md-6">
                <label for="prix">Prix:</label>
                <input  class="form-control" type="number" step="0.01" id="prix" name="prix" required>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="isbn">ISBN:</label>
                <input  class="form-control" type="text" id="isbn" name="isbn" required>
            </div>
            
            <div class="form-group">
                <label for="resume">Résumé:</label>
                <textarea  class="form-control" id="resume" name="resume" required></textarea>
            </div>
            </div>
        <button type="submit" class="btn btn-primary">Ajouter le Livre</button>
    </form>
@endsection
