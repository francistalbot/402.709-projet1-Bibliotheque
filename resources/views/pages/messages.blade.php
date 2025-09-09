@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="py-1 py-md-3">
    <h2>Messages</h2>
    </div>
    <hr>
    <div class="m-lg-5 m-3">
    
            @foreach($messages as $message)
                <div class="w-lg-50 mx-auto"  >
                    <div class="card m-lg-5 m-3 ">
                        <div class="card-body">
                            <div class="row mb-3 text-start">
                                <a class="card-link text-left" ><strong>Nom :</strong> {{ $message->name }}</a>
                                    <div ><strong>Email :</strong> {{ $message->email }}</div>
                                    <div><strong>Message :</strong> {{ $message->texte }}</div>
                                    <div><strong>Envoyé le :</strong> {{ $message->created_at->format('d/m/Y H:i') }}</div>
                            </div>
                        
                        </div>
                    </div>
                </div>
                @endforeach
    </ul>
@endsection


