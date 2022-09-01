@extends('layouts.user')

@section('extra-css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{ asset("user/css/bootstrap.min.css") }}>
    <!-- animate CSS -->
    <link rel="stylesheet" href={{ asset("user/css/animate.css") }}>
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href={{ asset("user/css/owl.carousel.min.css") }}>
    <!-- font awesome CSS -->
    <link rel="stylesheet" href={{ asset("user/css/all.css") }}>
    <!-- flaticon CSS -->
    <link rel="stylesheet" href={{ asset("user/css/flaticon.css") }}>
    <link rel="stylesheet" href={{ asset("user/css/themify-icons.css") }}>
    <!-- font awesome CSS -->
    <link rel="stylesheet" href={{ asset("user/css/magnific-popup.css") }}>
    <!-- swiper CSS -->
    <link rel="stylesheet" href={{ asset("user/css/slick.css") }}>
    <!-- style CSS -->
    <link rel="stylesheet" href={{ asset("user/css/style.css") }}>
@endsection

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
                            <a href="{{ route('register') }}" class="btn_3">Créer un compte</a>
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

@section('extra-js')
    <!-- jquery -->
    <script src={{ asset("user/js/jquery-1.12.1.min.js") }}></script>
    <!-- popper js -->
    <script src={{ asset("user/js/popper.min.js") }}></script>
    <!-- bootstrap js -->
    <script src={{ asset("user/js/bootstrap.min.js") }}></script>
    <!-- easing js -->
    <script src={{ asset("user/js/jquery.magnific-popup.js") }}></script>
    <!-- swiper js -->
    <script src={{ asset("user/js/swiper.min.js") }}></script>
    <!-- swiper js -->
    <script src={{ asset("user/js/masonry.pkgd.js") }}></script>
    <!-- particles js -->
    <script src={{ asset("user/js/owl.carousel.min.js") }}></script>
    <script src={{ asset("user/js/jquery.nice-select.min.js") }}></script>
    <!-- slick js -->
    <script src={{ asset("user/js/slick.min.js") }}></script>
    <script src={{ asset("user/js/jquery.counterup.min.js") }}></script>
    <script src={{ asset("user/js/waypoints.min.js") }}></script>
    <script src={{ asset("user/js/contact.js") }}></script>
    <script src={{ asset("user/js/jquery.ajaxchimp.min.js") }}></script>
    <script src={{ asset("user/js/jquery.form.js") }}></script>
    <script src={{ asset("user/js/jquery.validate.min.js") }}></script>
    <script src={{ asset("user/js/mail-script.js") }}></script>
    <script src={{ asset("user/js/stellar.js") }}></script>
    <script src={{ asset("user/js/price_rangs.js") }}></script>
    <!-- custom js -->
    <script src={{ asset("js/custom.js") }}></script>
@endsection
