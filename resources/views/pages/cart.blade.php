@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Votre panier</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Votre panier</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Produits</th>
                            <th>Prix</th>
                            <th>Quantitée(s)</th>
                            <th>Total</th>
                            <th>Suppr.</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @forelse (Cart::content() as $item)
                            <tr>
                                <td class="align-middle"><img src="{{ asset('assets/products/' . $item->model->image) }}"
                                        alt="" style="width: 50px;">
                                    {{ $item->model->title }}</td>
                                <td class="align-middle">{{ $item->model->getPrice() }}</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="decrement btn btn-sm btn-primary btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" data-id="{{ $item->rowId }}"
                                            class="qty form-control form-control-sm bg-secondary text-center"
                                            value="{{ getQty($item->qty) }}" readonly>
                                        <div class="input-group-btn">
                                            <button class="increment btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">{{ subTotal($item->model->price, $item->qty) }}</td>

                                <td class="align-middle">
                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-primary"><i
                                                class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <h2 class="text-center">Votre panier est vide.</h2>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                {{-- <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form> --}}
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Résumé du panier</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Sous-Total</h6>
                            <h6 class="font-weight-medium">{{ getPrice(Cart::subtotal()) }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">TAX</h6>
                            <h6 class="font-weight-medium">{{ getPrice(Cart::tax()) }}</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{ getPrice(Cart::total()) }}</h5>
                        </div>
                        @if (Cart::count() > 0)
                            <a href="{{ route('order.create') }}" class="btn btn-block btn-primary my-3 py-3">Commander</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection


@section('extra-js')
    <script>
        jQuery(document).ready(function($) {

            const MAX = 10;
            const MIN = 1;

            $('button.increment').click(function(e) {
                e.preventDefault();
                let qty = $(this).parent().prev('input.qty');
                console.log(qty.val());
                if (qty.val() > MAX) {
                    qty.val(10);
                } else {
                    updateCart(qty, qty.val());
                }
            });


            $('button.decrement').click(function(e) {
                e.preventDefault();
                let qty = $(this).parent().next('input.qty');
                console.log(qty.val());
                if (qty.val() < MIN) {
                    qty.val(1);
                } else {
                    updateCart(qty, qty.val());
                }
            });

            function updateCart(input, value) {
                var token = $('meta[name="csrf-token"]').attr('content');
                var rowId = input.attr('data-id');
                fetch(
                    `/cart/${rowId}`, {
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": token
                        },
                        method: 'post',
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
