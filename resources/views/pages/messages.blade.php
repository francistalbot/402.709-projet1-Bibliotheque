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
                                    <div><strong>Message :</strong> {!! nl2br($message->texte) !!}</div>
                                    <div><strong>Envoyé le :</strong> {{ $message->created_at->format('d/m/Y H:i') }}</div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('messages.destroy', $message->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?')">
                                    Supprimer
                                </button>
                            </form>
                            <form action="{{ route('messages.update', $message->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="lu" value="{{ $message->lu ? 0 : 1 }}">
                                <button type="submit" class="btn btn-sm {{ $message->lu ? 'btn-secondary' : 'btn-success' }}">
                                    {{ $message->lu ? 'Marquer comme non lu' : 'Marquer comme lu' }}
                                </button>
                            </form>

                    </div>
                </div>
                @endforeach
    </ul>
@endsection


