@extends('layouts.app')

@section('title', 'Liste des Livres')

@section('content')
    <!-- cart + summary -->
    <section class="bg-light my-5">
        <div class="container">
            <div class="row">
                <!-- cart -->
                <div class="col-lg-9">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <div class="card border shadow-0">
                        <div class="m-4">
                            <div class="mb-3">
                                <span class="card-title mb-4 h4">Votre panier</span>
                                <a href="{{ route('clear') }}" class="float-end">Vider</a>:
                            </div>
                            <hr />
                            @foreach ($items as $item)
                                <div class="row gy-3 mb-4">
                                    <div class="col-lg-5">
                                        <div class="me-lg-5">
                                            <div class="d-flex">
                                                <!-- <img src=""
                                                        class="border rounded me-3" style="width: 96px; height: 96px" />-->
                                                <div class="">
                                                    <a href="#" class="nav-link">{{ $item->name }}</a>
                                                    <p class="text-muted">{{ Number::currency($item->price) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-3 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                        <td>
                                            <div class="input-group bootstrap-touchspin">
                                                <span class="input-group-btn"><a
                                                        href="{{ route('decrease.quantity', $item->id) }}"
                                                        class="btn btn-default bootstrap-touchspin-down"
                                                        type="button">-</a></span><span
                                                    class="input-group-addon bootstrap-touchspin-prefix"
                                                    style="display: none"></span>
                                                <input type="text" name="" value="{{ $item->quantity }}"
                                                    class="form-control px-3" />
                                                <span class="input-group-addon bootstrap-touchspin-postfix"
                                                    style="display: none"></span><span class="input-group-btn">
                                                    <a href="{{ route('add.quantity', $item->id) }}"
                                                        class="btn btn-default bootstrap-touchspin-up"
                                                        type="button">+</a></span>
                                            </div>
                                        </td>
                                        <div class="">
                                            <p class="h6">
                                                {{ Number::currency($item->quantity * $item->price) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                        <div class="float-md-end">
                                            <a href="{{ route('remove.item', $item->id) }}"
                                                class="btn btn-light border text-danger icon-hover-danger">
                                                Retirer</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="border-top pt-4 mx-4 mb-4">
                            <p>
                                <i class="fas fa-truck text-muted fa-lg"></i> Livraison gratuite sous 1 à 2 jours
                            </p>
                            <p class="text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip
                            </p>
                        </div>
                    </div>
                </div>
                <!-- cart -->
                <!-- summary -->
                <div class="col-lg-3">
                    <div class="card mb-3 border shadow-0">
                        <div class="card-body">
                            <form action="{{ route('coupon.apply') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">coupon promo</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control border"id="code" name="code"
                                            placeholder="code promo" />   
                                        <button class="btn btn-light border">Appliquer</button>
                                    </div>
                                </div>
                            </form>
                            <!--
                            <form method="POST" action="{{ route('stripe.refund', ['paymentIntentId' => 'pi_demo_123']) }}">
                                @csrf
                                <label>Montant ($)</label>
                                <input name="amount" type="number" step="0.01" value="10.00">
                                <button type="submit">Rembourser</button>
                            </form>
                        -->
                        </div>
                    </div>

                    <div class="card shadow-0 border">
                        <div class="card-body">
                            <hr />
                            <h5 class="mb-3">Résumé</h5>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Remise:</p>
                                <p class="mb-2 fw-bold"> {{ $value }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Prix ​​total:</p>
                                <p class="mb-2 fw-bold">{{ Number::currency($total, 'cad') }}</p>
                            </div>

                            <div class="mt-3">
                                <a href="{{ route('stripe.form', ['price' => $total]) }}"
                                    class="btn btn-success w-100 shadow-0 mb-2">
                                    Payer
                                </a>
                                <a href="{{ route('livres.index') }}" class="btn btn-light w-100 border mt-2">
                                    Retourner au bibliotheque
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- summary -->
            </div>
        </div>
    </section>
@endsection
