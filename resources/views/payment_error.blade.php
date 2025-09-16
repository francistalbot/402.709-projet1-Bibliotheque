@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Payment Failed</h2>
    <p>{{ $message }}</p>
    <a href="{{ url('/') }}" class="btn btn-danger">Return to Home</a>
</div>
@endsection
