@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title mb-0">Liste des livraison par pays</h5>
                        <a href="{{ route('admin.shippings.create') }}" class="btn btn-primary">Ajouter</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Pays</th>
                                <th>Prix</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($shippings as $shipping)
                                <tr>
                                    <td>{{ $shipping->id }}</td>
                                    <td>{{ $shipping->name }}</td>
                                    <td>{{ $shipping->country->name }}</td>
                                    <td>{{ $shipping->price }} FCFA</td>
                                    <td>
                                        <a href="{{ route('admin.shippings.edit', $shipping->id) }}" title="Modifier">
                                            <i class="align-middle me-1" data-feather="edit"></i></a>
                                        <form action="{{ route('admin.shippings.destroy', $shipping->id) }}" method="POST"
                                            onsubmit="" style="display: inline" id="delete_form">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" style="color: red"
                                                onclick="return confirm('Etes-vous sur ?') ? document.getElementById('delete_form').submit() : null">
                                                <i class="align-middle me-1" data-feather="trash"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="">
                                            <p class="d-flex justify-content-center">Pas de livraison par pays disponible
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <div class="mt-1 px-5">
                            {{ $shippings->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
@endsection
