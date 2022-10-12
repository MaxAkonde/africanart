@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Vérifiez votre adresse e-mail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Vérifiez votre adresse e-mail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Verify password Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <h3>
                Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification. <br>
                Si vous n'avez pas reçu l'e-mail
            </h3>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    Un nouveau lien de vérification a été envoyé à votre adresse e-mail.
                </div>
            @endif
            <div class="contact-form">
                <form class="row contact_form" method="POST" action="{{ route('verification.resend') }}"
                    novalidate="novalidate">
                    @csrf

                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Cliquez ici pour en demander un autre
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Verify password End -->
@endsection

@section('extra-js')
@endsection
