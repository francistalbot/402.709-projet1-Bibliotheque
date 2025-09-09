@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div class="py-1 py-md-3">
        <h2>Contactez-nous</h2>
    </div>
    <hr>
     @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <div class="mb-3 text-start">
        <h4>Informations de contact</h4>
        <span><strong>Téléphone :</strong> (514) 123-4567</br></span>
        <span><strong>Email :</strong> contact@bibliotheque.com</br></span>
        <span><strong>Adresse :</strong> 123 Rue de la Bibliothèque, Montréal, QC</br></span>
        <br>
        <span><strong>Horaires d'ouverture :</strong></span><br>
        <span><strong>Lundi au jeudi :</strong> 9h - 18h</br></span>
        <span><strong>Vendredi et samedi :</strong> 11h - 17h</br></span>
        <span><strong>Dimanche :</strong> Fermé</br></span>
         </div>
    <form action="{{ route('messages.store') }}" method="POST" class="my-5 ">
        @csrf
        <div class="mb-3 text-start  w-lg-50 m-auto p-3 ">
            <h4>Envoyez-nous un message</h4>
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="texte">Message :</label>
                <textarea id="texte" name="texte" class="form-control" required></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
@endsection
