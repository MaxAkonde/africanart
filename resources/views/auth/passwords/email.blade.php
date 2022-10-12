@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Mot de passe oublier ?</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Mot de passe oublier ?</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Reset Password Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Réinitialiser votre mot de passe</span></h2>
        </div>
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="contact-form">
                <form class="row contact_form" method="POST" action="{{ route('password.email') }}"
                    novalidate="novalidate">
                    @csrf

                    <div class="col-md-12 form-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email"
                            autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Envoyer le lien de réinitialisation du mot de passe
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
