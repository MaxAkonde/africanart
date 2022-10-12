@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Connexion</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Connexion</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Login Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="contact-form">
                <form class="row contact_form" method="POST" action="{{ route('login') }}" novalidate="novalidate">
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
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember">
                                <label class="custom-control-label" for="remember">Se Souvenir de moi ?</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Connexion
                        </button>
                    </div>
                    <div class="col-md-12 mt-2 text-center">
                        @if (Route::has('password.request'))
                            <a class="lost_pass mt-5 text-center" href="{{ route('password.request') }}">Mot de passe oublier
                                ?</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Login End -->
@endsection

@section('extra-js')
@endsection
