@extends('layouts.admin')

@section('breadcrumbs')
    <a class="navbar-brand" href="{{ route('admin.shippings.index') }}">Livraison</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Ajouter une livraison</h4>
                </div>
                <div class="content">
                    <form action="{{ route('admin.shippings.store') }}" method="post" class="">
                        @csrf

                        <div class="form-group">
                            <label for="name" class=" form-control-label">Intituler</label>
                            <input type="text" id="name" placeholder="Entrer l'intituler" name="name"
                                value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"
                                autocomplete="name" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="country_id" class=" form-control-label">Pays</label>
                            <select name="country_id" id="country_id"
                                class="form-control @error('country_id') is-invalid @enderror">
                                <option value="">--- Choisissez un pays ---</option>
                                @foreach ($countries as $countrie)
                                    <option value="{{ $countrie->id }}">{{ $countrie->name }}</option>
                                @endforeach
                            </select>

                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price" class=" form-control-label">Pirx</label>
                            <input type="text" id="price" placeholder="Entrer le prix" name="price"
                                value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror"
                                autocomplete="price" required autofocus>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-secondary btn-sm">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection