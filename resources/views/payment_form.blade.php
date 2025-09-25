@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Make a Payment</div>
                <div class="card-body">
                    <!-- PayPal Payment Form -->
                    <form action="{{ route('payment.pay') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount" id="amount" value="{{ $price }}" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Pay with PayPal</button>
                    </form>

                    <!-- Stripe Payment Form -->
                    <form action="{{ route('stripe.form') }}" method="GET" class="mt-4">
                        <div class="form-group">
                            <label for="stripe-amount">Amount</label>
                            <input type="text" name="amount" id="stripe-amount" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Pay with Stripe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
