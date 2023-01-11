@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Information de la commande</h5>
                </div>
                <div class="card-body">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td>N° commande</td>
                                <td class="text-end">{{ $order->pincode }}</td>
                            </tr>
                            <tr>
                                <td>Nom du client</td>
                                <td class="text-end">{{ $order->fname }} {{ $order->lname }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td class="text-end">{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td class="text-end">{{ $order->created_at->format('j F, Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Adresse Facturaion</h5>
                </div>
                <div class="card-body">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td>Adresse</td>
                                <td class="text-end">{{ $order->address1 }}</td>
                            </tr>
                            <tr>
                                <td>Téléphone</td>
                                <td class="text-end">{{ $order->phone }}</td>
                            </tr>
                            <tr>
                                <td>Ville</td>
                                <td class="text-end">{{ $order->city }}</td>
                            </tr>
                            <tr>
                                <td>Etat</td>
                                <td class="text-end">{{ $order->state }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-g-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Autre</h5>
                </div>
                <div class="card-body">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td>Adresse 2</td>
                                <td class="text-end">{{ $order->address2 }}</td>
                            </tr>
                            <tr>
                                <td>Pays</td>
                                <td class="text-end">{{ $order->country->name }}</td>
                            </tr>
                            <tr>
                                <td>Status de la commande</td>
                                <td class="text-end">
                                    @if ($order->status)
                                        <span class="badge bg-success">Valider</span>
                                    @else
                                        <span class="badge bg-info">En cours</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Détails de la commande</h5>
                </div>
                <div class="card-body">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td>Sous-Total</td>
                                <td class="text-end">{{ getPrice($order->subtotal) }}</td>
                            </tr>
                            <tr>
                                <td>Livraison</td>
                                <td class="text-end">{{ getPrice($order->shipping) }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td class="text-end">{{ getPrice($order->amount) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Produits commandé(s)</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover my-0">
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
@endsection

@section('extra-js')
    <script></script>
@endsection
