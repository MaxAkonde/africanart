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
            </div>
            <div class="cupon_area">
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
                        <form class="row contact_form" action="{{ route('order.store') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control @error('fname') is-invalid @enderror"
                                    id="first" placeholder="Nom *" name="fname" value="{{ old('fname') }}" />
                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control @error('lname') is-invalid @enderror"
                                    id="last" name="lname" placeholder="Prénom *" value="{{ old('lname') }}" />
                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="company" name="company"
                                    placeholder="Entreprise" value="{{ old('company') }}" />
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="number" placeholder="Numéro *" name="phone" value="{{ old('phone') }}" />
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Email *" value="{{ old('email') }}" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select class="form-control custom-select" name="city">
                                    <option value="0">-- Choisissez un pays --</option>

                                    <option value="Afrique Centrale">Afrique Centrale </option>
                                    <option value="Afrique du sud">Afrique du Sud </option>
                                    <option value="Algérie">Algérie </option>
                                    <option value="Allemagne">Allemagne </option>
                                    <option value="Angola">Angola </option>
                                    <option value="Argentine">Argentine </option>
                                    <option value="Australie">Australie </option>
                                    <option value="Autriche">Autriche </option>

                                    <option value="Belgique">Belgique </option>
                                    <option value="Bénin">Bénin </option>
                                    <option value="Botswana">Botswana </option>
                                    <option value="Brésil">Brésil </option>
                                    <option value="Bulgarie">Bulgarie </option>
                                    <option value="Burkina Faso">Burkina Faso </option>
                                    <option value="Burundi">Burundi </option>

                                    <option value="Cameroun">Cameroun </option>
                                    <option value="Canada">Canada </option>
                                    <option value="Cap vert">Cap Vert </option>
                                    <option value="Chili">Chili </option>
                                    <option value="Chine">Chine </option>
                                    <option value="Chypre">Chypre </option>
                                    <option value="Colombie">Colombie </option>
                                    <option value="Congo">Congo </option>
                                    <option value="Congo démocratique">Congo démocratique </option>
                                    <option value="Cote d'Ivoire">Côte d'Ivoire </option>

                                    <option value="Danemark">Danemark </option>
                                    <option value="Djibouti">Djibouti </option>

                                    <option value="Egypte">Egypte </option>
                                    <option value="Erythree">Erythree </option>
                                    <option value="Espagne">Espagne </option>
                                    <option value="Estonie">Estonie </option>
                                    <option value="Etats Unis">Etats Unis </option>
                                    <option value="Ethiopie">Ethiopie </option>

                                    <option value="Finlande">Finlande </option>
                                    <option value="France">France </option>

                                    <option value="Gabon">Gabon </option>
                                    <option value="Gambie">Gambie </option>
                                    <option value="Ghana">Ghana </option>
                                    <option value="Guinee">Guinee </option>
                                    <option value="Guinee Bissau">Guinee Bissau </option>
                                    <option value="Guinee equatoriale">Guinee Equatoriale </option>
                                    <option value="Guyana">Guyana </option>

                                    <option value="Haiti">Haiti </option>
                                    <option value="Hawaii">Hawaii </option>
                                    <option value="Honduras">Honduras </option>
                                    <option value="Hong Kong">Hong Kong </option>
                                    <option value="Hongrie">Hongrie </option>

                                    <option value="Inde">Inde </option>
                                    <option value="Indonesie">Indonesie </option>
                                    <option value="Italie">italie </option>

                                    <option value="Jamaique">Jamaique </option>
                                    <option value="Japon">Japon </option>

                                    <option value="Kenya">Kenya </option>

                                    <option value="Laos">Laos </option>
                                    <option value="Lesotho">Lesotho </option>
                                    <option value="Lettonie">Lettonie </option>
                                    <option value="Liban">Liban </option>
                                    <option value="Liberia">Liberia </option>
                                    <option value="Lybie">Lybie </option>

                                    <option value="Macao">Macao </option>
                                    <option value="Madagascar">Madagascar </option>
                                    <option value="Malaisie">Malaisie </option>
                                    <option value="Malawi">Malawi </option>
                                    <option value="Maldives">Maldives </option>
                                    <option value="Mali">Mali </option>
                                    <option value="Malte">Malte </option>
                                    <option value="Maroc">Maroc </option>
                                    <option value="Maurice">Maurice </option>
                                    <option value="Mauritanie">Mauritanie </option>
                                    <option value="Mayotte">Mayotte </option>
                                    <option value="Mexique">Mexique </option>
                                    <option value="Moldavie">Moldavie </option>
                                    <option value="Monaco">Monaco </option>
                                    <option value="Mozambique">Mozambique </option>

                                    <option value="Namibie">Namibie </option>
                                    <option value="Niger">Niger </option>
                                    <option value="Nigeria">Nigeria </option>
                                    <option value="Norvege">Norvege </option>

                                    <option value="Ouganda">Ouganda </option>

                                    <option value="Paraguay">Paraguay </option>
                                    <option value="Pays Bas">Pays Bas </option>
                                    <option value="Perou">Perou </option>
                                    <option value="Philippines">Philippines </option>
                                    <option value="Pologne">Pologne </option>
                                    <option value="Portugal">Portugal </option>

                                    <option value="Reunion">Reunion </option>
                                    <option value="Roumanie">Roumanie </option>
                                    <option value="Royaume Uni">Royaume Uni </option>
                                    <option value="Russie">Russie </option>
                                    <option value="Rwanda">Rwanda </option>

                                    <option value="Sénégal">Sénégal </option>
                                    <option value="Seychelles">Seychelles </option>
                                    <option value="Sierra Leone">Sierra Leone </option>
                                    <option value="Somalie">Somalie </option>
                                    <option value="Soudan">Soudan </option>
                                    <option value="Suede">Suede </option>
                                    <option value="Suisse">Suisse </option>

                                    <option value="Tanzanie">Tanzanie </option>
                                    <option value="Tchad">Tchad </option>
                                    <option value="Togo">Togo </option>
                                    <option value="Tunisie">Tunisie </option>
                                    <option value="Turquie">Turquie </option>

                                    <option value="Ukraine">Ukraine </option>
                                    <option value="Uruguay">Uruguay </option>

                                    <option value="Vietnam">Vietnam </option>

                                    <option value="Zambie">Zambie </option>
                                    <option value="Zimbabwe">Zimbabwe </option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control @error('address1') is-invalid @enderror"
                                    id="add1" name="address1" placeholder="Adresse 01 *"
                                    value="{{ old('address1') }}" />
                                @error('address1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add2" name="address2"
                                    placeholder="Adresse 02" value="{{ old('address2') }}" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control @error('state') is-invalid @enderror"
                                    id="city" name="state" placeholder="Ville/Quartier"
                                    value="{{ old('state') }}" />
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="col-md-12 form-group p_star">
                                <select class="country_select">
                                    <option value="1">District</option>
                                    <option value="2">District</option>
                                    <option value="4">District</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="zip" name="zip"
                                    placeholder="Postcode/ZIP" />
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector" />
                                    <label for="f-option2">Create an account?</label>
                                </div>
                            </div> --}}
                            <div class="col-md-12 form-group">
                                {{-- <div class="creat_account">
                                    <h3>Shipping Details</h3>
                                    <input type="checkbox" id="f-option3" name="selector" />
                                    <label for="f-option3">Ship to a different address?</label>
                                </div> --}}
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Votre message">{{ old('message') }}</textarea>
                            </div>
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
                                            <span class="middle">{{ $product->qty }}x</span>
                                            <span
                                                class="last">{{ number_format($product->model->price * $product->qty, 0, '.', ' ') }}</span>
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
                                        <span>{{ Cart::subtotal() . ' FCFA' }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Tax (TVA 18%)
                                        <span>{{ Cart::tax() . ' FCFA' }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Total
                                        <span>{{ Cart::total() . ' FCFA' }}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="selector" />
                                    <label for="f-option5">Cheque</label>
                                    <div class="check"></div>
                                </div>
                                <p>
                                    Veuillez envoyer un chèque au nom du magasin, rue du magasin, ville du magasin, état/comté du magasin, code postal du magasin.
                                </p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector" />
                                    <label for="f-option6">Paypal </label>
                                    <img src="{{ asset('user/img/product/single-product/card.jpg') }}" alt="" />
                                    <div class="check"></div>
                                </div>
                                <p>
                                    Veuillez envoyer un chèque au nom du magasin, rue du magasin, ville du magasin, état/comté du magasin, code postal du magasin.
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
    {{-- <script src={{ asset('user/js/custom.js') }}></script> --}}

    <script>
        jQuery(document).ready(function($) {
            $('a.btn_3').click(function(e) {
                e.preventDefault();
                $('form.contact_form').submit();
            });
        });
    </script>
@endsection
