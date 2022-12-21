@extends('layouts.admin')

@section('breadcrumbs')
    <a class="navbar-brand" href="{{ route('admin.roles.index') }}">Roles</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Modifier {{ $role->name }}</h4>
                </div>
                <div class="content">
                    <form action="{{ route('admin.roles.update', $role->id) }}" method="post" class="">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name" class=" form-control-label">Nom du role</label>
                            <input type="text" id="name" placeholder="Entrer le nom du role" name="name"
                                value="{{ $role->name }}" class="form-control @error('name') is-invalid @enderror"
                                autocomplete="name" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-secondary btn-sm">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection