@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Modifier {{ $shipping->name }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.shippings.update', $shipping->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="name">Intituler</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                id="name" placeholder="Entrer l'intituler" value="{{ $shipping->name }}"
                                autocomplete="name" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="country_id">Pays</label>

                            <select name="country_id" id="country_id"
                                class="form-control @error('country_id') is-invalid @enderror">
                                <option value="">--- Choisissez un pays ---</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" @if ($country->id === $shipping->country_id) selected @endif>
                                        {{ $country->name }}</option>
                                @endforeach
                            </select>

                            @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="price">Prix</label>
                            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price"
                                id="price" placeholder="Entrer le prix" value="{{ $shipping->price }}"
                                autocomplete="price" required autofocus>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
