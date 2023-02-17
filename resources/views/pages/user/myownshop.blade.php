@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Boutique de {{ Auth::user()->name }}</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Boutique</p>
            </div>
        </div>
    </div>

    <!-- Page Header End -->

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        @if (session('success'))
            <div class="row px-xl-5 mb-3">
                <div class="col-lg-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        <div class="row px-xl-5">
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                        </div>
                    </div>
                    @foreach ($latest as $item)
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <a href="{{ route('single', $item) }}"><img class="img-fluid w-100"
                                            style="width: 500px; height:350px;"
                                            src="{{ asset('assets/products/' . $item->image) }}" alt=""></a>
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3"><a href="{{ route('single', $item) }}"
                                            style="text-decoration: none">{{ $item->title }}</a></h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>{{ $item->getPrice() }}</h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center bg-light border">
                                    <form action="{{ route('cart.store') }}" class="addCartForm" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="title" value="{{ $item->title }}">
                                        <input type="hidden" name="price" value="{{ $item->price }}">
                                        <button type="submit" class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au
                                            panier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-12 pb-1">
                        {{ $latest->links('vendor.pagination.user') }}
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection


@section('extra-js')
    <script>
        jQuery(document).ready(function($) {
            $('.search_button').click(function(e) {
                e.preventDefault();
                $('#search_form').submit();
            });
        });
    </script>
@endsection
