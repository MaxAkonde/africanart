@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Ajouter une valeur</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.values.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Intituler</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                id="name" placeholder="Entrer l'intituler" value="{{ old('name') }}"
                                autocomplete="name" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="attribute_id">Attributs</label>

                            <select name="attribute_id" id="attribute_id"
                                class="form-control @error('attribute_id') is-invalid @enderror">
                                <option value="">--- Choisissez un attribut ---</option>
                                @foreach ($attributes as $attribut)
                                    <option value="{{ $attribut->id }}">{{ $attribut->name }}</option>
                                @endforeach
                            </select>

                            @error('attribute_id')
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
