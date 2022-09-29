@extends('layouts.user')

@section('extra-css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{ asset('user/css/bootstrap.min.css') }}>
    <!-- animate CSS -->
    <link rel="stylesheet" href={{ asset('user/css/animate.css') }}>
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href={{ asset('user/css/owl.carousel.min.css') }}>
    <!-- nice select CSS -->
    <link rel="stylesheet" href="{{ asset('user/css/nice-select.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href={{ asset('user/css/all.css') }}>
    <!-- flaticon CSS -->
    <link rel="stylesheet" href={{ asset('user/css/flaticon.css') }}>
    <link rel="stylesheet" href={{ asset('user/css/themify-icons.css') }}>
    <!-- font awesome CSS -->
    <link rel="stylesheet" href={{ asset('user/css/magnific-popup.css') }}>
    <!-- swiper CSS -->
    <link rel="stylesheet" href={{ asset('user/css/slick.css') }}>
    <link rel="stylesheet" href="{{ asset('user/css/price_rangs.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href={{ asset('user/css/style.css') }}>
@endsection

@section('content')
{{-- {!! dd($order->products) !!} --}}
    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Order Confirmation</h2>
                            <p>Home <span>-</span> Order Confirmation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================ confirmation part start =================-->
    <section class="confirmation_part padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="confirmation_tittle">
                        <span>Thank you. Your order has been received.</span>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>order info</h4>
                        <ul>
                            <li>
                                <p>order number</p><span>: {{ $order->pincode }}</span>
                            </li>
                            <li>
                                <p>data</p><span>: Oct 03, 2017</span>
                            </li>
                            <li>
                                <p>total</p><span>: USD 2210</span>
                            </li>
                            <li>
                                <p>mayment methord</p><span>: Check payments</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Billing Address</h4>
                        <ul>
                            <li>
                                <p>Street</p><span>: 56/8</span>
                            </li>
                            <li>
                                <p>city</p><span>: Los Angeles</span>
                            </li>
                            <li>
                                <p>country</p><span>: United States</span>
                            </li>
                            <li>
                                <p>postcode</p><span>: 36952</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>shipping Address</h4>
                        <ul>
                            <li>
                                <p>Street</p><span>: 56/8</span>
                            </li>
                            <li>
                                <p>city</p><span>: Los Angeles</span>
                            </li>
                            <li>
                                <p>country</p><span>: United States</span>
                            </li>
                            <li>
                                <p>postcode</p><span>: 36952</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="order_details_iner">
                        <h3>Order Details</h3>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">Produit(s)</th>
                                    <th scope="col">Quantitée(s)</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->products as $item)
                                <tr>
                                    <th colspan="2"><span>{{ $item->title }}</span></th>
                                    <th>x{{ $item->pivot->qty }}</th>
                                    <th> <span>{{ $item->pivot->total }}</span></th>
                                </tr>
                                @endforeach
                                {{-- <tr>
                                    <th colspan="2"><span>Pixelstore fresh Blackberry</span></th>
                                    <th>x02</th>
                                    <th> <span>$720.00</span></th>
                                </tr>
                                <tr>
                                    <th colspan="2"><span>Pixelstore fresh Blackberry</span></th>
                                    <th>x02</th>
                                    <th> <span>$720.00</span></th>
                                </tr>
                                <tr>
                                    <th colspan="2"><span>Pixelstore fresh Blackberry</span></th>
                                    <th>x02</th>
                                    <th> <span>$720.00</span></th>
                                </tr>
                                <tr>
                                    <th colspan="3">Subtotal</th>
                                    <th> <span>$2160.00</span></th>
                                </tr>
                                <tr>
                                    <th colspan="3">shipping</th>
                                    <th><span>flat rate: $50.00</span></th>
                                </tr> --}}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col" colspan="3">Quantitée(s)</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ confirmation part end =================-->
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
    <script src="{{ asset('js/stellar.js') }}"></script>
    <script src="{{ asset('js/price_rangs.js') }}"></script>
    <!-- custom js -->
    <script src={{ asset('user/js/custom.js') }}></script>
@endsection
