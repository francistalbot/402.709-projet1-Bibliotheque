@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Payment Successful- </h2>
    <pre>{{ $payment_intent }}</pre>
    <p>Thank you for your payment!</p>
    <a href="{{ url('/') }}" class="btn btn-success">Return to Home</a>
</div>
@endsection