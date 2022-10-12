@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Produit de qualité</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Livraison gratuite</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Retour sous 14 jours</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24h/24 et 7j/7</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            @foreach ($categories as $item)
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="box-shadow: 1px 1px 5px #ddd;padding:30px;">
                        <p class="text-right">15 Products</p>
                        <a href="#" class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid" style="" src="{{ asset('assets/categories/' . $item->image) }}"
                                alt="">
                        </a>
                        <h5 class="font-weight-semi-bold m-0">{{ $item->name }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="{{ asset('user/img/offer-1.png') }}" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20 % DE RÉDUCTION SUR TOUTE LA COMMANDE</h5>
                        <h1 class="mb-4 font-weight-semi-bold text-dark">Masques African</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Commander</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="{{ asset('user/img/offer-2.png') }}" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20 % DE RÉDUCTION SUR TOUTE LA COMMANDE</h5>
                        <h1 class="mb-4 font-weight-semi-bold text-dark">Pièces Antiques</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Commander</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Produits tendance</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($latest as $item)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item mb-4" style="border:1px solid #f3f3f3;">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                            style="box-shadow: 1px 1px 5px #ddd">
                            <img class="img-fluid w-100" style="width: 500px; height:350px;"
                                src="{{ asset('assets/products/' . $item->image) }}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                            style="box-shadow: 1px 1px 5px #ddd">
                            <h6 class="text-truncate mb-3">{{ $item->title }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ $item->getPrice() }}</h6>
                                {{-- <h6 class="text-muted ml-2"><del>$123.00</del></h6> --}}
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border"
                            style="box-shadow: 1px 1px 5px #ddd">
                            <a href="{{ route('single', $item) }}" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i>Voir les détails</a>
                            <form action="{{ route('cart.store') }}" class="addCartForm" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <input type="hidden" name="title" value="{{ $item->title }}">
                                <input type="hidden" name="price" value="{{ $item->price }}">
                                <button type="submit" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au panier</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->


    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3 text-dark"><span class="bg-secondary px-2">Restez à jour</span></h2>
                    <p class="text-dark">Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo
                        ipsum eirmod
                        duo labore labore.</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Votre Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Abonnez-vous</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Vient d'arriver</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($latest as $item)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" style="width: 500px; height:350px;"
                                src="{{ asset('assets/products/' . $item->image) }}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $item->title }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ $item->getPrice() }}</h6>
                                {{-- <h6 class="text-muted ml-2"><del>$123.00</del></h6> --}}
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('single', $item) }}" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i>Voir les détails</a>
                            <form action="{{ route('cart.store') }}" class="addCartForm" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <input type="hidden" name="title" value="{{ $item->title }}">
                                <input type="hidden" name="price" value="{{ $item->price }}">
                                <button type="submit" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au panier</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Products End -->


    <!-- Vendor Start -->
    {{-- <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('user/img/vendor-1.jpg') }}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('user/img/vendor-2.jpg') }}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('user/img/vendor-3.jpg') }}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('user/img/vendor-4.jpg') }}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('user/img/vendor-5.jpg') }}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('user/img/vendor-6.jpg') }}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('user/img/vendor-7.jpg') }}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('user/img/vendor-8.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Vendor End -->
@endsection

@section('extra-js')
@endsection
