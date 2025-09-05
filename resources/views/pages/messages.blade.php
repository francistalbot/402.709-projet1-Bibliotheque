@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <h2>Messages</h2>
    <ul>
            @foreach($messages as $message)
                <li>
                    <strong>{{ $message->name }}</strong> ({{ $message->email }}): {{ $message->texte }}
                </li>
                @endforeach
    </ul>
@endsection


