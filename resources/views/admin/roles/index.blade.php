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
    <a class="navbar-brand" href="{{ route('admin.roles.index') }}">Roles</a>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-md-10 col">
                            <h4 class="title">Liste des roles</h4>
                        </div>
                        <div class="col-md-2 col">
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Ajouter</a>
                        </div>
                    </div>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td><small class="text-muted">{{ $role->slug }}</small></td>
                                    <td>
                                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                                            class="fa fa-pencil edit-button" title="Modifier"></a>
                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
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
                                            <p class="d-flex justify-content-center">Pas de rôle disponible</p>
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
@endsection
