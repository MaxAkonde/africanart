@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title mb-0">Liste des produits</h5>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Ajouter</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Prix</th>
                                <th>Catégories</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        <img src="{{ asset('assets/products/' . $product->image) }}" class=""
                                            style="width: 45px" alt="Image a la une products {{ $product->id }}">
                                    </td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->getPrice() }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.products.edit', $product->id) }}" title="Modifier">
                                            <i class="align-middle me-1" data-feather="edit"></i></a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
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
                                    <td colspan="6">
                                        <div class="">
                                            <p class="d-flex justify-content-center">Pas de produits disponible</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <div class="mt-1 px-5">
                            {{ $products->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
@endsection
