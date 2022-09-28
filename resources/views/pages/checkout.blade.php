@extends('layouts.user')

@section('extra-css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{ asset('user/css/bootstrap.min.css') }}>
    <!-- animate CSS -->
    <link rel="stylesheet" href={{ asset('user/css/animate.css') }}>
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href={{ asset('user/css/owl.carousel.min.css') }}>
    <!-- nice select CSS -->
    <link rel="stylesheet" href={{ asset('user/css/nice-select.css') }}>
    <!-- font awesome CSS -->
    <link rel="stylesheet" href={{ asset('user/css/all.css') }}>
    <!-- flaticon CSS -->
    <link rel="stylesheet" href={{ asset('user/css/flaticon.css') }}>
    <link rel="stylesheet" href={{ asset('user/css/themify-icons.css') }}>
    <!-- font awesome CSS -->
    <link rel="stylesheet" href={{ asset('user/css/magnific-popup.css') }}>
    <!-- swiper CSS -->
    <link rel="stylesheet" href={{ asset('user/css/slick.css') }}>
    <link rel="stylesheet" href={{ asset('user/css/price_rangs.css') }}>
    <!-- style CSS -->
    <link rel="stylesheet" href={{ asset('user/css/style.css') }}>
@endsection

@section('content')
    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Valider votre commande</h2>
                            <p>Acceuil <span>-</span> Paiement</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Checkout Area =================-->
    <section class="checkout_area padding_top">
        <div class="container">
            {{-- <div class="returning_customer">
                <div class="check_title">
                    <h2>
                        Returning Customer?
                        <a href="#">Click here to login</a>
                    </h2>
                </div>
                <p>
                    If you have shopped with us before, please enter your details in the
                    boxes below. If you are a new customer, please proceed to the
                    Billing & Shipping section.
                </p>
                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="name" name="name" value=" " />
                        <span class="placeholder" data-placeholder="Username or Email"></span>
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="password" class="form-control" id="password" name="password" value="" />
                        <span class="placeholder" data-placeholder="Password"></span>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="btn_3">
                            log in
                        </button>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option" name="selector" />
                            <label for="f-option">Remember me</label>
                        </div>
                        <a class="lost_pass" href="#">Lost your password?</a>
                    </div>
                </form>
            </div> --}}
            {{-- <div class="cupon_area">
                <div class="check_title">
                    <h2>
                        Have a coupon?
                        <a href="#">Click here to enter your code</a>
                    </h2>
                </div>
                <input type="text" placeholder="Enter coupon code" />
                <a class="tp_btn" href="#">Apply Coupon</a>
            </div> --}}
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Détails de la facturation</h3>
                        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="first" name="name" />
                                <span class="placeholder" data-placeholder="Nom"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="last" name="name" />
                                <span class="placeholder" data-placeholder="Prénom"></span>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="company" name="company"
                                    placeholder="Entreprise" />
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="number" />
                                <span class="placeholder" data-placeholder="Numéro"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="compemailany" />
                                <span class="placeholder" data-placeholder="Adresse Email"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select class="country_select">
                                    <option value="1">-- Choisissez un pays --</option>
                                    <option value="2">Country</option>
                                    <option value="4">Country</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add1" name="add1" />
                                <span class="placeholder" data-placeholder="Adresse 01"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add2" name="add2" />
                                <span class="placeholder" data-placeholder="Adresse 02"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="city" name="city" />
                                <span class="placeholder" data-placeholder="Ville/Quartier"></span>
                            </div>
                            {{-- <div class="col-md-12 form-group p_star">
                                <select class="country_select">
                                    <option value="1">District</option>
                                    <option value="2">District</option>
                                    <option value="4">District</option>
                                </select>
                            </div> --}}
                            {{-- <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="zip" name="zip"
                                    placeholder="Postcode/ZIP" />
                            </div> --}}
                            {{-- <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector" />
                                    <label for="f-option2">Create an account?</label>
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Shipping Details</h3>
                                    <input type="checkbox" id="f-option3" name="selector" />
                                    <label for="f-option3">Ship to a different address?</label>
                                </div>
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                            </div> --}}
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Votre Commande</h2>
                            <ul class="list">
                                <li>
                                    <a href="#">Produit(s)
                                        <span>Total</span>
                                    </a>
                                </li>
                                @foreach (Cart::content() as $product)
                                    <li>
                                        <a href="#">{{ $product->model->title }}
                                            <span class="middle">x {{ $product->qty }}</span>
                                            <span class="last">{{ subTotal($product->model->price,$product->qty) . " FCFA" }}</span>
                                        </a>
                                    </li>
                                @endforeach
                                {{-- <li>
                                    <a href="#">Fresh Tomatoes
                                        <span class="middle">x 02</span>
                                        <span class="last">$720.00</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Fresh Brocoli
                                        <span class="middle">x 02</span>
                                        <span class="last">$720.00</span>
                                    </a>
                                </li> --}}
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Sous-Total
                                        <span>{{ Cart::subtotal() . " FCFA" }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Livraison
                                        <span>{{ Cart::tax() . " FCFA" }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Total
                                        <span>{{ Cart::total() . " FCFA" }}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="selector" />
                                    <label for="f-option5">Check payments</label>
                                    <div class="check"></div>
                                </div>
                                <p>
                                    Please send a check to Store Name, Store Street, Store Town,
                                    Store State / County, Store Postcode.
                                </p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector" />
                                    <label for="f-option6">Paypal </label>
                                    <img src="img/product/single-product/card.jpg" alt="" />
                                    <div class="check"></div>
                                </div>
                                <p>
                                    Please send a check to Store Name, Store Street, Store Town,
                                    Store State / County, Store Postcode.
                                </p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector" />
                                <label for="f-option4">J'ai lu et j'accepte les </label>
                                <a href="#">Terms & conditions*</a>
                            </div>
                            <a class="btn_3" href="#">Proceder au payement</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection


@section('extra-js')
    <!-- jquery plugins here-->
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
    <script src={{ asset('user/js/custom.js') }}></script>
@endsection
