@extends('layouts.user')

@section('extra-css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{ asset('user/css/bootstrap.min.css') }}>
    <!-- animate CSS -->
    <link rel="stylesheet" href={{ asset('user/css/animate.css') }}>
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href={{ asset('user/css/owl.carousel.min.css') }}>
    <!-- font awesome CSS -->
    <link rel="stylesheet" href={{ asset('user/css/all.css') }}>
    <!-- flaticon CSS -->
    <link rel="stylesheet" href={{ asset('user/css/flaticon.css') }}>
    <link rel="stylesheet" href={{ asset('user/css/themify-icons.css') }}>
    <!-- font awesome CSS -->
    <link rel="stylesheet" href={{ asset('user/css/magnific-popup.css') }}>
    <!-- swiper CSS -->
    <link rel="stylesheet" href={{ asset('user/css/slick.css') }}>
    <!-- style CSS -->
    <link rel="stylesheet" href={{ asset('user/css/style.css') }}>
@endsection

@section('content')
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Vérifiez votre adresse e-mail</h2>
                            <p>Acceuil <span>-</span> Vérifiez votre adresse e-mail</p>
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
                <div class="col-lg-12 col-md-12">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Un nouveau lien de vérification a été envoyé à votre adresse e-mail.
                        </div>
                    @endif
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>
                                Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification. <br>
                                Si vous n'avez pas reçu l'e-mail
                            </h3>
                            <form class="row contact_form" method="POST" action="{{ route('verification.resend') }}"
                                novalidate="novalidate">
                                @csrf

                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn_3">
                                        Cliquez ici pour en demander un autre
                                    </button>
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
    <script src={{ asset('user/js/jquery-1.12.1.min.js') }}></script>
    <!-- popper js -->
    <script src={{ asset('user/js/popper.min.js') }}></script>
    <!-- bootstrap js -->
    <script src={{ asset('user/js/bootstrap.min.js') }}></script>
    <!-- easing js -->
    <script src={{ asset('user/js/jquery.magnific-popup.js') }}></script>
    <!-- swiper js -->
    <script src={{ asset('user/js/swiper.min.js') }}></script>
    <!-- swiper js -->
    <script src={{ asset('user/js/masonry.pkgd.js') }}></script>
    <!-- particles js -->
    <script src={{ asset('user/js/owl.carousel.min.js') }}></script>
    <script src={{ asset('user/js/jquery.nice-select.min.js') }}></script>
    <!-- slick js -->
    <script src={{ asset('user/js/slick.min.js') }}></script>
    <script src={{ asset('user/js/jquery.counterup.min.js') }}></script>
    <script src={{ asset('user/js/waypoints.min.js') }}></script>
    <script src={{ asset('user/js/contact.js') }}></script>
    <script src={{ asset('user/js/jquery.ajaxchimp.min.js') }}></script>
    <script src={{ asset('user/js/jquery.form.js') }}></script>
    <script src={{ asset('user/js/jquery.validate.min.js') }}></script>
    <script src={{ asset('user/js/mail-script.js') }}></script>
    <script src={{ asset('user/js/stellar.js') }}></script>
    <script src={{ asset('user/js/price_rangs.js') }}></script>
    <!-- custom js -->
    <script src={{ asset('js/custom.js') }}></script>
@endsection
