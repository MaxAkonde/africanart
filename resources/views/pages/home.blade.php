@extends('layouts.user')

@section('content')
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel">
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Eventails</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                            <a href="#" class="btn_2">Acheter</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src={{ asset('user/img/DSC_1248.png') }} alt="">
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Tissus</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                            <a href="#" class="btn_2">Acheter</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src={{ asset('user/img/DSC_0012.png') }} alt="">
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Pièces Antiques</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                            <a href="#" class="btn_2">Acheter</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src={{ asset('user/img/DSC_1230.png') }} alt="">
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Meubles</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                            <a href="#" class="btn_2">Acheter</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="user/img/DSC_1194.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-counter"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Catégorie en vedette</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 col-sm-6">
                    <div class="single_feature_post_text">
                        {{-- <p>Premium Quality</p> --}}
                        <h3>Eventails</h3>
                        <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="user/img/feature/DSC_0001.png" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature_post_text">
                        {{-- <p>Premium Quality</p> --}}
                        <h3>Tissus</h3>
                        <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="user/img/feature/DSC_0009.png" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature_post_text">
                        {{-- <p>Premium Quality</p> --}}
                        <h3>Pièces Antiques</h3>
                        <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="user/img/feature/DSC_0186.png" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-sm-6">
                    <div class="single_feature_post_text">
                        {{-- <p>Premium Quality</p> --}}
                        <h3>Meubles</h3>
                        <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="user/img/feature/DSC_1194.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Derniers produits</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_list_slider owl-carousel">
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_1.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_2.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_3.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_4.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_5.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_6.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_7.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_8.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_1.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_2.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_3.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_4.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_5.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_6.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_7.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="user/img/product/product_8.png" alt="">
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part start-->

    <!-- awesome_shop start-->
    <section class="our_offer section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6">
                    <div class="offer_img">
                        <img src="user/img/DSC_1208-scaled.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="offer_text">
                        <h2>Vente hebdomadaire, 60 % de réduction sur tous les produits</h2>
                        <div class="date_countdown">
                            <div id="timer">
                                <div id="days" class="date"></div>
                                <div id="hours" class="date"></div>
                                <div id="minutes" class="date"></div>
                                <div id="seconds" class="date"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Votre adresse mail"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <a href="#" class="input-group-text btn_2" id="basic-addon2">Reserver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- awesome_shop part start-->

    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Produits vedettes </h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        <div class="single_product_item">
                            <img src="user/img/product/product_1.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="user/img/product/product_2.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="user/img/product/product_3.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="user/img/product/product_4.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="user/img/product/product_5.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->

    <!-- subscribe_area part start-->
    <section class="subscribe_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="subscribe_area_text text-center">
                        <h5>Rejoignez notre newsletter</h5>
                        <h2>Abonnez-vous pour être mis à jour avec de nouvelles offres</h2>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Votre adresse email"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <a href="#" class="input-group-text btn_2" id="basic-addon2">Abonnez-vous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::subscribe_area part end::-->

    <!-- subscribe_area part start-->
    <section class="client_logo padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="single_client_logo">
                        <img src="user/img/client_logo/client_logo_1.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="user/img/client_logo/client_logo_2.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="user/img/client_logo/client_logo_3.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="user/img/client_logo/client_logo_4.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="user/img/client_logo/client_logo_5.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="user/img/client_logo/client_logo_3.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="user/img/client_logo/client_logo_1.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="user/img/client_logo/client_logo_2.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="user/img/client_logo/client_logo_3.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="user/img/client_logo/client_logo_4.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::subscribe_area part end::-->
@endsection
