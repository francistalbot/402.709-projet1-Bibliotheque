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
    <p>Pour toute question, n'hésitez pas à nous contacter.</p>
    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <div class="mb-3 text-start w-lg-50 m-auto">
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
