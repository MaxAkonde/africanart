@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Confirmation de commande</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Confirmation de commande</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                @if ($order->status == 0)
                    <div class="alert alert-info" role="alert">
                        Votre commande est en cours de traitement. Merci!
                    </div>
                @endif
                @if ($order->status == 1)
                    <div class="alert alert-success" role="alert">
                        Votre commande à été valider. Merci!
                    </div>
                @endif
                @if ($order->status == 2)
                    <div class="alert alert-danger" role="alert">
                        Votre commande à été annuler!
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-6">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Information de la commande</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">N° commande</h6>
                            <h6 class="font-weight-medium">{{ $order->pincode }}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Nom du client</h6>
                            <h6 class="font-weight-medium">{{ $order->fname }} {{ $order->lname }}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">E-mail</h6>
                            <h6 class="font-weight-medium">{{ $order->email }}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Date</h6>
                            <h6 class="font-weight-medium">{{ $order->created_at->format('j F, Y') }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Méthod de paiement</h6>
                            <h6 class="font-weight-medium">{{ $order->payment->name }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Adresse Facturaion</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Adresse</h6>
                            <h6 class="font-weight-medium">{{ $order->address1 }}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Téléphone</h6>
                            <h6 class="font-weight-medium">{{ $order->phone }}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Ville</h6>
                            <h6 class="font-weight-medium">{{ $order->city }}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Etat</h6>
                            <h6 class="font-weight-medium">{{ $order->state }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Pays</h6>
                            <h6 class="font-weight-medium">{{ $order->country->name }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Produits</th>
                            <th>Prix</th>
                            <th>Quantitée(s)</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($order->products as $item)
                            <tr>
                                <td class="align-middle"><img src="{{ asset('assets/products/' . $item->image) }}"
                                        alt="" style="width: 50px;">
                                    {{ $item->title }}</td>
                                <td class="align-middle">{{ $item->getPrice() }}</td>
                                <td class="align-middle">
                                    {{ getQty($item->pivot->qty) }}
                                </td>
                                <td class="align-middle">{{ subTotal($item->price, $item->pivot->qty) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-6"></div>
            <div class="col-lg-6">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Détails de la commande</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Sous-Total</h6>
                            <h6 class="font-weight-medium">{{ getPrice($order->subtotal) }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">TAX</h6>
                            <h6 class="font-weight-medium">{{ getPrice($order->tax) }}</h6>
                        </div>
                        {{-- <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Livraison</h6>
                            <h6 class="font-weight-medium">{{ getPrice($order->shipping) }}</h6>
                        </div> --}}
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">{{ getPrice($order->amount) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
@endsection
