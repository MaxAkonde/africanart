@extends('layouts.user')

@section('extra-css')
@endsection


@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Notre blog</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Blog</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        {{-- <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Ne rater plus nos derniers articles</span></h2>
        </div> --}}
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card produt-item border-0 mb-4">
                            <h2 class="font-weight-semi-bold mb-3">{{ $post->title }}</h2>
                            <small class="mb-3">
                                <i class="fas fa-clock"></i>
                                {{ $post->created_at->diffForHumans() }}
                            </small>
                            <h6 class="text-truncate mb-3">
                                <i class="fas fa-bookmark"></i>
                                {{ $post->topic->name }}
                            </h6>
                            <div
                                class="card-header product-img position-relative-overwflow-hidden bg-transparent border p-0 mb-4">
                                <img src="{{ asset('assets/posts/' . $post->image) }}" alt=""
                                    class="img-fluid w-100">
                            </div>

                            <p>
                                {!! $post->description !!}
                            </p>
                            <div class="d-flex justify-content-between mb-4">
                                <div>
                                    <b>
                                        Partager

                                    </b>
                                    <div class="d-inline-flex align-items-center">
                                        <a class="text-dark px-2" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="text-dark px-2" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="text-dark px-2" href="#">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                        <a class="text-dark px-2" href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        <a class="text-dark pl-2" href="#">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 px-0">
                                <h4 class="mb-4">Laissez un commentaire</h4>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Votre commentaire *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nom *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Laissez un commentaire" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="col px-0">
                    <h5 class="font-weight-semi-bold mb-3">Recherche</h5>
                    <div class="d-flex justify-content-between mb-4">
                        <form action="#" class="col-lg-12 px-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Rechercher un article">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-transparent text-primary">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <h5 class="font-weight-semi-bold mb-3">Catégories</h5>
                <ul class="list-group">
                    @forelse ($categories as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $item->name }}
                            <span class="badge badge-primary badge-pill">{{ $item->post_count }}</span>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection


@section('extra-js')
@endsection
