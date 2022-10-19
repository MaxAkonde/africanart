@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Inscription</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Inscription</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Register Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="contact-form">
                <form class="row contact_form" method="POST" action="{{ route('register') }}" novalidate="novalidate">
                    @csrf
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" placeholder="Nom" required autocomplete="name"
                            autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 form-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" value="" placeholder="Mot de passe" required
                            autocomplete="current-password">

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
                        @if ($user)
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="role" value="{{ $user->id }}"
                                        id="{{ $user->slug }}">
                                    <label class="custom-control-label" for="{{ $user->slug }}">{{ $user->name }}</label>
                                </div>
                            </div>
                        @endif

                        @if ($vendeur)
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="role" value="{{ $vendeur->id }}"
                                        id="{{ $vendeur->slug }}">
                                    <label class="custom-control-label" for="{{ $vendeur->slug }}">{{ $vendeur->name }}</label>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Créer mon compte
                        </button>
                    </div>
                    <div class="col-md-12 mt-2 text-center">
                        <a class="lost_pass mt-5 text-center" href="{{ route('login') }}">Vous avez déjà un compte ?
                            Connectez vous</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Register End -->
@endsection

@section('extra-js')
@endsection
