@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title mb-0">Liste des commandes</h5>
                        {{-- <a href="{{ route('admin.countries.create') }}" class="btn btn-primary">Ajouter</a> --}}
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover my-0">
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
                                            <span class="badge bg-success">Valider</span>
                                        @else
                                            <span class="badge bg-info">En cours</span>
                                        @endif
                                    </td>
                                    <td>{{ getPrice($order->amount) }}</td>
                                    <td>
                                        <a href="{{ route('orders.show', $order->id) }}" title="Voir les détails">
                                            <i class="align-middle me-1" data-feather="eye"></i></a>
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
                    <div>
                        <div class="mt-1 px-5">
                            {{ $orders->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
@endsection
