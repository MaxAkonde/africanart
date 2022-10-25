@extends('layouts.admin')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">

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
                            <h1>Liste des commandes</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">commandes</a></li>
                                <li class="active">Liste</li>
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
        @if (session('status'))
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Commandes</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">N° Commande</th>
                                <th scope="col">Nom & Prénom</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
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
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script src="{{ asset('admin/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#bootstrap-data-table').DataTable();
        });
    </script>
@endsection
