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
                            <h2>Votre panier</h2>
                            <p>Acceuil <span>-</span> Panier</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Cart Area =================-->
    <section class="cart_area padding_top">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="user/img/product/single-product/cart-1.jpg" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <p>Minimalistic shop for multipurpose use</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>$360.00</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                                        <input class="input-number" type="text" value="1" min="0"
                                            max="10">
                                        <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <h5>$720.00</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="user/img/product/single-product/cart-1.jpg" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <p>Minimalistic shop for multipurpose use</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>$360.00</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <!-- <input type="text" value="1" min="0" max="10" title="Quantity:"
                          class="input-text qty input-number" />
                        <button
                          class="increase input-number-increment items-count" type="button">
                          <i class="ti-angle-up"></i>
                        </button>
                        <button
                          class="reduced input-number-decrement items-count" type="button">
                          <i class="ti-angle-down"></i>
                        </button> -->
                                        <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                                        <input class="input-number" type="text" value="1" min="0"
                                            max="10">
                                        <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <h5>$720.00</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="user/img/product/single-product/cart-1.jpg" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <p>Minimalistic shop for multipurpose use</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>$360.00</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                                        <input class="input-number" type="text" value="1" min="0"
                                            max="10">
                                        <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <h5>$720.00</h5>
                                </td>
                            </tr>
                            <tr class="bottom_button">
                                <td>
                                    <a class="btn_1" href="#">Update Cart</a>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="cupon_text float-right">
                                        <a class="btn_1" href="#">Close Coupon</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>$2160.00</h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li>
                                                <a href="#">Flat Rate: $5.00</a>
                                            </li>
                                            <li>
                                                <a href="#">Free Shipping</a>
                                            </li>
                                            <li>
                                                <a href="#">Flat Rate: $10.00</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">Local Delivery: $2.00</a>
                                            </li>
                                        </ul>
                                        <h6>
                                            Calculate Shipping
                                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        </h6>
                                        <select class="shipping_select">
                                            <option value="1">Bangladesh</option>
                                            <option value="2">India</option>
                                            <option value="4">Pakistan</option>
                                        </select>
                                        <select class="shipping_select section_bg">
                                            <option value="1">Select a State</option>
                                            <option value="2">Select a State</option>
                                            <option value="4">Select a State</option>
                                        </select>
                                        <input type="text" placeholder="Postcode/Zipcode" />
                                        <a class="btn_1" href="#">Update Details</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="{{ route('shop') }}">Continue Shopping</a>
                        <a class="btn_1 checkout_btn_1" href="{{ route('checkout') }}">Proceed to checkout</a>
                    </div>
                </div>
            </div>
    </section>
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
