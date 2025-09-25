@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="mb-4">Pay with Stripe</h1>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Stripe Payment Gateway
                </div>
                <div class="card-body">
                    <form action="{{ route('stripe.pay') }}" method="POST" id="payment-form">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="" required placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Montant</label>
                            <input type="number" name="amount" id="amount" class="form-control" value="{{ $price }}" step="0.01" required placeholder="Enter the amount">
                        </div>
                        <div id="card-element" class="mb-3">
                            <!-- Stripe Elements will be inserted here -->
                        </div>
                        <button class="btn btn-success" type="submit" id="submit-button">
                            <i class="fa fa-credit-card"></i> Soumettre le paiement
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stripe = Stripe('{{ env('STRIPE_PUBLIC_KEY') }}');
        const elements = stripe.elements();
        const card = elements.create('card', {
            style: {
                base: {
                    fontSize: '16px',
                    color: '#32325d',
                },
            },
        });

        card.mount('#card-element');

        const form = document.getElementById('payment-form');
        const submitButton = document.getElementById('submit-button');

        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            // Disable the submit button to prevent multiple submissions
            submitButton.disabled = true;

            const { token, error } = await stripe.createToken(card);

            if (error) {
                console.error('Stripe Error:', error);
                alert(error.message);
                submitButton.disabled = false; // Re-enable the button
            } else {
                console.log('Stripe Token:', token.id);

                // Add the token to the form and submit
                const hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                form.submit();
            }
        });
    });
</script>
@endsection
