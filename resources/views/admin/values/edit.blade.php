@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Modifier {{ $value->name }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.values.update', $value->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="name">Intituler</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                id="name" placeholder="Entrer l'intituler" value="{{ $value->name }}"
                                autocomplete="name" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="attribute_id">Attribut</label>

                            <select name="attribute_id" id="attribute_id"
                                class="form-control @error('attribute_id') is-invalid @enderror">
                                <option value="">--- Choisissez un attribut ---</option>
                                @foreach ($attributes as $attribut)
                                    <option value="{{ $attribut->id }}" @if ($attribut->id === $value->attribute_id) selected @endif>
                                        {{ $attribut->name }}</option>
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
