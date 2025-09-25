@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Detail du Paiement</h2>
    <p><strong>Transaction ID:</strong> {{ $paymentDetails->payment_id }}</p>
    <p><strong>Montant:</strong> {{ number_format($paymentDetails->amount, 2) }} {{ strtoupper($paymentDetails->currency) }}</p>
    <p><strong>Etat:</strong> {{ ucfirst($paymentDetails->payment_status) }}</p>
    <p><strong>Date:</strong> {{ $paymentDetails->created_at->format('Y-m-d H:i:s') }}</p>  
    <hr>
    <h2>Remboursement du Paiement</h2>
    <form action="{{ route('stripe.refund', $paymentIntentId) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="amount" class="form-label">Montant à rembourser:</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <button type="submit" class="btn btn-danger">Effectuer le Remboursement</button>
    </form>
</div>
@endsection