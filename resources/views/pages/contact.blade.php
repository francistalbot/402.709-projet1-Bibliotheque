@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <h2>Contactez-nous</h2>
     @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <p>Pour toute question, n'hésitez pas à nous contacter.</p>
    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <button type="submit">Envoyer</button>
    </form>
@endsection
