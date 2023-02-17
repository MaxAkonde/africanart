@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Retrouver votre commande</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Tracking</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Tracking Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="contact-form">
                @if (session('status'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>N° commande ou E-mail incorrect!</strong> Veuillez entrer des informations
                        correctes.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <p>Pour suivre votre commande, veuillez entrer votre ID de commande dans la case ci-dessous et
                    appuyez sur le bouton "Suivre". Celui-ci vous a été indiqué sur votre reçu et dans l'e-mail de
                    confirmation que vous auriez dû recevoir.</p>
                <form class="row tracking_form" action="{{ route('findOrder') }}" method="POST" novalidate="novalidate">
                    @csrf
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="order" name="order" placeholder="N° Commande"
                            required>
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Votre E-mail"
                            required>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="btn btn-primary btn-lg btn-block">Suivre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Tracking End -->
@endsection

@section('extra-js')
@endsection
