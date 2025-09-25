@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Historique des Achats</h2>
    @if($payments->isEmpty())
        <p>Pas d'achat touver.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Montant</th>
                    <th>Devise</th>
                    <th>Etat</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->payment_id }}</td>
                    <td>{{ number_format($payment->amount, 2) }}</td>
                    <td>{{ strtoupper($payment->currency) }}</td>
                    <td>{{ ucfirst($payment->payment_status) }}</td>
                    <td>{{ $payment->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <a href="{{ url('/') }}" class="btn btn-primary">Retour vers la page d'accueil</a>
</div>
@endsection
