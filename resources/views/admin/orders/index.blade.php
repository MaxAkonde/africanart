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
    <a class="navbar-brand" href="#">Commande</a>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-md-10 col">
                            <h4 class="title">Liste des commande</h4>
                        </div>
                        <div class="col-md-2 col">
                        </div>
                    </div>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>N° Commande</th>
                                <th>Nom & Prénom</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Montant</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->pincode }}</td>
                                    <td>{{ $order->fname }} {{ $order->lname }}</td>
                                    <td>{{ $order->created_at->format('j F, Y') }}</td>
                                    <td>
                                        @if ($order->status)
                                            <span class="badge badge-pill badge-success">Valider</span>
                                        @else
                                            <span class="badge badge-pill badge-info">En cours</span>
                                        @endif
                                    </td>
                                    <td>{{ getPrice($order->amount) }}</td>
                                    <td>
                                        <a href="{{ route('orders.show', $order->id) }}" class="fa fa-eye edit-button"
                                            title="Voir les détails"></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="">
                                            <p class="d-flex justify-content-center">Pas de commandes disponible</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>

                </div>
                <div>
                    <hr>
                    <div class="justify-content-center">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
@endsection
