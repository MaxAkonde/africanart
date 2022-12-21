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
    <a class="navbar-brand" href="#">Commande N° {{ $order->pincode }}</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Information de la commande</h4>
                </div>
                <div class="content">
                    <div class="table-full-width">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>N° commande</td>
                                    <td class="td-actions text-right">{{ $order->pincode }}</td>
                                </tr>
                                <tr>
                                    <td>Nom du client</td>
                                    <td class="td-actions text-right">{{ $order->fname }} {{ $order->lname }}</td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td class="td-actions text-right">{{ $order->created_at->format('j F, Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Adresse Facturaion</h4>
                </div>
                <div class="content">
                    <div class="table-full-width">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Adresse</td>
                                    <td class="td-actions text-right">{{ $order->address1 }}</td>
                                </tr>
                                <tr>
                                    <td>Téléphone</td>
                                    <td class="td-actions text-right">{{ $order->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Ville</td>
                                    <td class="td-actions text-right">{{ $order->city }}</td>
                                </tr>
                                <tr>
                                    <td>Etat</td>
                                    <td class="td-actions text-right">{{ $order->state }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Autres</h4>
                </div>
                <div class="content">
                    <div class="table-full-width">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Adresse 2</td>
                                    <td class="td-actions text-right">{{ $order->address2 }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td class="td-actions text-right">{{ $order->email }}</td>
                                </tr>
                                <tr>
                                    <td>Pays</td>
                                    <td class="td-actions text-right">{{ $order->country->name }}</td>
                                </tr>
                                <tr>
                                    <td>Status de la commande</td>
                                    <td class="td-actions text-right">
                                        @if ($order->status)
                                            <span class="badge badge-pill badge-success">Valider</span>
                                        @else
                                            <span class="badge badge-pill badge-info">En cours</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Détails de la commande</h4>
                </div>
                <div class="content">
                    <div class="table-full-width">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Sous-Total</td>
                                    <td class="td-actions text-right">{{ getPrice($order->subtotal) }}</td>
                                </tr>
                                <tr>
                                    <td>TAX</td>
                                    <td class="td-actions text-right">{{ getPrice($order->tax) }}</td>
                                </tr>
                                <tr>
                                    <td>Livraison</td>
                                    <td class="td-actions text-right">{{ getPrice($order->shipping) }}</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td class="td-actions text-right">{{ getPrice($order->amount) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Produits commandé(s)</h4>
                </div>
                <div class="content">
                    <div class="table-full-width">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Produits</th>
                                    <th>Prix</th>
                                    <th>Quantitée(s)</th>
                                    <th>Total</th>
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
    </div>
@endsection

@section('extra-js')
    <script></script>
@endsection
