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
        <!-- Carte Google Maps -->
            <div class="map-container mt-4">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2794.8331341876665!2d-73.6567158!3d45.5578192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91a541c64b70d%3A0x654e3138211fefef!2sColl%C3%A8ge%20Ahuntsic!5e0!3m2!1sfr!2sca!4v1736386171234!5m2!1sfr!2sca" 
                    width="100%" 
                    height="300" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
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
