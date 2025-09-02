@extends('layouts.app')

@section('title', 'Liste des Catégories')

@section('content')
    <h2>Liste des Catégories</h2>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <a href="{{ route('categories.create') }}">Ajouter une Catégorie</a>
    <ul>
        @foreach($categories as $category)
            <li><a href="{{ route('categories.show',['category' => $category->id])}}" >{{ $category->name }}</a></li>
        @endforeach
    </ul>
@endsection