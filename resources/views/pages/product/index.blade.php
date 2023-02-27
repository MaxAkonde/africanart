@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    @if (isset($query))
        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Recherche</h1>
                <div class="d-inline-flex">
                    <p class="m-0">Resulat de la recherche</p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">"{{ $query }}"</p>
                </div>
            </div>
        </div>
    @else
        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Boutique</h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">Boutique</p>
                </div>
            </div>
        </div>
    @endif

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

        {{-- @if (isset($query))
        <div class="row px-xl-5 mb-3">
            <div class="col-lg-12">
                <div class="d-inline-flex">
                    <h6 class="m-0">Resultat de la recherche : </h6>
                    <h6 class="m-0">"{{ $query }}"</h6>
                </div>
            </div>
        </div>
        @endif --}}

        <div class="row px-xl-5">
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            {{-- <form action="{{ route('search') }}" id="search_form" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Rechercher par nom">
                                    <div class="input-group-append search_button">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form> --}}
                            {{-- <div class="dropdown ">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Trier par
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Derniers</a>
                                    <a class="dropdown-item" href="#">Populaires</a>
                                    <a class="dropdown-item" href="#">Mieux notés</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    @foreach ($latest as $item)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <a href="{{ route('product.show', $item) }}"><img class="img-fluid w-100 products_image"
                                            src="{{ asset('assets/products/thumbnails/' . $item->image) }}" alt=""></a>
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate"><a href="{{ route('product.show', $item) }}"
                                            style="text-decoration: none">{{ $item->title }}</a></h6>
                                    <small>{{ $item->category->name }}</small>
                                    <div class="d-flex justify-content-center">
                                        <h6>{{ $item->getPrice() }}</h6>
                                        {{-- <h6 class="text-muted ml-2"><del>$123.00</del></h6> --}}
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center bg-light border">
                                    {{-- <a href="{{ route('single', $item) }}" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-eye text-primary mr-1"></i>Voir les détails</a> --}}
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
                        {{-- <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mb-3">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav> --}}
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
