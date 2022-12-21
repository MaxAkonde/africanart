@extends('layouts.admin')

@section('breadcrumbs')
    <a class="navbar-brand" href="{{ route('admin.countries.index') }}">Pays</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Modifier {{ $country->name }}</h4>
                </div>
                <div class="content">
                    <form action="{{ route('admin.countries.update', $country->id) }}" method="post" class="">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name" class=" form-control-label">Nom de la ville</label>
                            <input type="text" id="name" placeholder="Entrer le nom de la ville" name="name"
                                value="{{ $country->name }}" class="form-control @error('name') is-invalid @enderror"
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