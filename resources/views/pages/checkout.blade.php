@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Valider votre commande</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Valider votre commande</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Adresse de facturation</h4>
                    <form action="{{ route('order.store') }}" method="POST" novalidate="novalidate" id="form_checkout">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Nom</label>
                                <input class="form-control @error('fname') is-invalid @enderror" id="first"
                                    placeholder="Nom" name="fname" value="{{ old('fname') }}" type="text">
                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Prénom</label>
                                <input class="form-control form-control @error('lname') is-invalid @enderror" type="text"
                                    id="last" name="lname" placeholder="Prénom" value="{{ old('lname') }}">
                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email"
                                    id="email" name="email" placeholder="Email *" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Téléphone</label>
                                <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                    id="number" placeholder="Numéro *" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Adresse 01</label>
                                <input class="form-control @error('address1') is-invalid @enderror" type="text"
                                    id="add1" name="address1" placeholder="Adresse 01 *"
                                    value="{{ old('address1') }}">
                                @error('address1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Adresse 02</label>
                                <input class="form-control" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Pays</label>
                                <select class="custom-select" name="country">
                                    @foreach ($countries as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Ville/Commune</label>
                                <input class="form-control @error('city') is-invalid @enderror" type="text"
                                    id="city" name="city" placeholder="Ville/Commune" value="{{ old('city') }}">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Etat/Départment</label>
                                <input class="form-control @error('state') is-invalid @enderror" type="text"
                                    id="state" name="state" placeholder="Etat/Département"
                                    value="{{ old('state') }}">
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <label>Message</label>
                                <textarea name="message" id="message" rows="8" class="form-control"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Détails de la commande</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Produits</h5>
                        @foreach (Cart::content() as $item)
                            <div class="d-flex justify-content-between">
                                <p>{{ $item->model->title }}</p>
                                <p>{{ $item->qty }} X
                                    {{ number_format($item->model->price * $item->qty, 0, '.', ' ') }}</p>
                            </div>
                        @endforeach
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Sous-Total</h6>
                            <h6 class="font-weight-medium">{{ Cart::subtotal() . ' FCFA' }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">TAX</h6>
                            <h6 class="font-weight-medium">{{ Cart::tax() . ' FCFA' }}</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{ Cart::total() . ' FCFA' }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payement</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">En Cash</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Transfert Bancaire</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button id="form_button"
                            class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Valider</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection


@section('extra-js')
    <script>
        jQuery(document).ready(function($) {
            $('#form_button').click(function() {
                $('#form_checkout').submit();
            });
        });
    </script>
@endsection
