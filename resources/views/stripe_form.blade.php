@extends('layouts.app') 
 @section('content') 
    <div class="container"> 
        <div class="row justify-content-center"> 
                <div class="col-md-8"> <div class="card"> 
                    <div class="card-header">Effectuer un paiement</div> 
                    <div class="card-body"> 
                        <form action="{{ route('stripe.pay') }}" method="POST" id="payment-form"> 
                            @csrf 
                            <input type="email" name="email" placeholder="Votre email" required> 
                            <input type="number" name="amount" value="{{ $price }}" placeholder="Montant" required> 
                            <div id="card-element"></div> 
                            <button type="submit">Payer</button> 
                        </form>
                    </div>  
                </div> 
        </div> 
    </div> 
@endsection