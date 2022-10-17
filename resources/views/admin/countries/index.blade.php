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
                            <h1>Liste des villes</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">villes</a></li>
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
                    <strong class="card-title">Villes</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($countries as $country)
                                <tr>
                                    <th scope="row">{{ $country->id }}</th>
                                    <td>{{ $country->name }}</td>
                                    <td><small class="text-muted">{{ $country->slug }}</small></td>
                                    <td>
                                        <a href="{{ route('admin.countries.edit', $country->id) }}"
                                            class="fa fa-pencil edit-button" title="Modifier"></a>
                                        <form action="{{ route('admin.countries.destroy', $country->id) }}" method="POST"
                                            onsubmit="" style="display: inline" id="delete_form">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#"
                                                onclick="return confirm('Etes-vous sur ?') ? document.getElementById('delete_form').submit() : null"
                                                class="fa fa-times delete-button"></a>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="">
                                            <p class="d-flex justify-content-center">Pas de villes disponible</p>
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
    <script></script>
@endsection
