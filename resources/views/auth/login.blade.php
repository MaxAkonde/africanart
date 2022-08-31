@extends('layouts.user')

@section('content')
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Connexion</h2>
                            <p>Acceuil <span>-</span> Connexion</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================login_part Area =================-->
    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Nouveau dans notre boutique ?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="#" class="btn_3">Créer un compte</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Content de vous revoir ! <br>
                                Veuillez vous connecter</h3>
                            <form class="row contact_form" method="POST" action="{{ route('login') }}"
                                novalidate="novalidate">
                                @csrf

                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" placeholder="Email"
                                        required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" value="" placeholder="Mot de passe" required
                                        autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="remember" name="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">Se Souvenir de moi ?</label>
                                    </div>
                                    <button type="submit" class="btn_3">
                                        Connexion
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="lost_pass" href="{{ route('password.request') }}">Mot de passe oublier
                                            ?</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
@endsection
