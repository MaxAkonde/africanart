@extends('layouts.admin')

@section('extra-css')
    <style>
        .edit-button {
            color: #007bff;
        }

        .edit-button:hover {
            color: #0069d9;
        }

        .delete-button {
            color: #dc3545;
        }

        .delete-button:hover {
            color: #c82333;
        }
    </style>
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Commande N° {{ $order->pincode }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">commandes</a></li>
                                <li><a href="{{ route('orders.index') }}">Liste</a></li>
                                <li class="active">N° {{ $order->pincode }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Information de la commande</strong>
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
                        <h6 class="font-weight-medium">Date</h6>
                        <h6 class="font-weight-medium">{{ $order->created_at->format('j F, Y') }}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Méthod de paiement</h6>
                        <h6 class="font-weight-medium">Mobile Money</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Adresse Facturaion</strong>
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
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Etat</h6>
                        <h6 class="font-weight-medium">{{ $order->state }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Autres</strong>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Adresse 2</h6>
                        <h6 class="font-weight-medium">{{ $order->address1 }}</h6>
                    </div>
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">E-mail</h6>
                        <h6 class="font-weight-medium">{{ $order->email }}</h6>
                    </div>
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Pays</h6>
                        <h6 class="font-weight-medium">{{ $order->country->name }}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Status de la commande</h6>
                        <h6 class="font-weight-medium">
                            @if ($order->status)
                                <span class="badge badge-pill badge-success">Valider</span>
                            @else
                                <span class="badge badge-pill badge-info">En cours</span>
                            @endif
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Détails de la commande</strong>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Sous-Total</h6>
                        <h6 class="font-weight-medium">{{ getPrice($order->subtotal) }}</h6>
                    </div>
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">TAX</h6>
                        <h6 class="font-weight-medium">{{ getPrice($order->tax) }}</h6>
                    </div>
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Livraison</h6>
                        <h6 class="font-weight-medium">{{ getPrice($order->shipping) }}</h6>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">{{ getPrice($order->amount) }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Produits commandé(s)</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Produits</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Quantitée(s)</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->products as $item)
                                <tr>
                                    <td class="align-middle"><img src="{{ asset('assets/products/' . $item->image) }}"
                                            alt="" style="width: 50px;">
                                        {{ $item->title }}</td>
                                    <td class="align-middle">{{ $item->getPrice() }}</td>
                                    <td class="align-middle">
                                        X {{ getQty($item->pivot->qty) }}
                                    </td>
                                    <td class="align-middle">{{ subTotal($item->price, $item->pivot->qty) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script></script>
@endsection
