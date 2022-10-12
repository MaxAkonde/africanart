@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Confirmez le mot de passe</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Confirmez le mot de passe</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Reset Password Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Veuillez confirmer votre mot de passe avant de
                    continuer.</span></h2>
        </div>
        <div class="container">
            <div class="contact-form">
                <form class="row contact_form" method="POST" action="{{ route('password.confirm') }}"
                    novalidate="novalidate">
                    @csrf

                    <div class="col-md-12 form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Confirmez le mot de passe
                        </button>
                    </div>
                    <div class="col-md-12 mt-2 text-center">
                        @if (Route::has('password.request'))
                            <a class="lost_pass mt-5 text-center" href="{{ route('password.request') }}">Mot de passe
                                oublier
                                ?</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Reset Password End -->
@endsection

@section('extra-js')
@endsection
