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
            @if (session('success'))
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Produit(s)</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Quantitée</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Cart::count() > 0)
                                @foreach (Cart::content() as $product)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ asset('products/' . $product->model->image) }}"
                                                        alt="" style="width: 100px" />
                                                </div>
                                                <div class="media-body">
                                                    <p>{{ $product->model->title }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>{{ $product->model->getPrice() }}</h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <span class="input-number-decrement {{ $product->id }}"> <i
                                                        class="ti-angle-down"></i></span>
                                                <input class="input-number" data-id="{{ $product->rowId }}" type="text" readonly value="{{ getQty($product->qty) }}"  min="0"
                                                    max="10">
                                                <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>{{ subTotal($product->model->price,$product->qty) }}</h5>
                                        </td>
                                        <td>
                                            <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn" style="color:red"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="bottom_button">
                                    <td>
                                        <a href="{{ route('cart.empty') }}" class="btn_1">Vider votre panier</a>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        {{-- <div class="cupon_text float-right">
                                            <a class="btn_1" href="#">Close Coupon</a>
                                        </div> --}}
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5>Sous-Total</h5>
                                    </td>
                                    <td>
                                        <h5>{{ Cart::subtotal() . " FCFA" }}</h5>
                                    </td>
                                    <td></td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="5">
                                        <h2 class="text-center">Votre panier est vide.</h2>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="{{ route('shop') }}">Ajouter au panier</a>
                        @if (Cart::count() > 0)
                            <a class="btn_1 checkout_btn_1" href="{{ route('checkout') }}">Commander</a>
                        @endif
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

    <script>
        jQuery(document).ready(function($) {
            var el = $('input.input-number');

            var min = el.attr('min') || false;
            var max = el.attr('max') || false;

            el.prev().on('click', function() {
                decrement($(this))
            });

            el.next().on('click', function() {
                increment($(this))
            });

            function decrement(el) {
                var input = el.next();
                var value = input[0].value;
                value--;
                if (!min || value >= min) {
                    updateCart(input, value);
                    input[0].value = value;
                }
            }

            function increment(el) {
                var input = el.prev();
                var value = input[0].value;
                value++;
                if (!min || value <= max) {
                    updateCart(input, value);
                    input[0].value = value++;
                }
            }

            function updateCart(input, value)
            {
                var token = $('meta[name="csrf-token"]').attr('content');
                var rowId = input.attr('data-id');
                fetch(
                    `/cart/${rowId}`,
                    {
                        headers : {
                            "Content-Type" : "application/json",
                            "Accept" : "application/json, text-plain, */*",
                            "X-Requested-With" : "XMLHttpRequest",
                            "X-CSRF-TOKEN" : token
                        },
                        method: 'patch',
                        body: JSON.stringify({
                            qty: value
                        })
                    }
                ).then((data) => {
                    console.log(data);
                    location.reload();
                }).catch((error) => {
                    console.log(error);
                });
                //console.log(value);
            }

        });
    </script>
@endsection
