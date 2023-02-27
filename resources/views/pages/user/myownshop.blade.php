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


        <div class="row px-xl-5">
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">

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
