@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Réinitialiser le mot de passe</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Réinitialiser le mot de passe</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Reset Password Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="contact-form">
                <form class="row contact_form" method="POST" action="{{ route('password.update') }}"
                    novalidate="novalidate">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="col-md-12 form-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ $email ?? old('email') }}" placeholder="Email" required
                            autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" value="" placeholder="Mot de passe" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 form-group">
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                            value="" placeholder="Confirmer mot de passe" required autocomplete="new-password">
                    </div>

                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Réinitialiser le mot de passe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Reset Password End -->
@endsection

@section('extra-js')
@endsection
