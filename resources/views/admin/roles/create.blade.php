@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Ajouter un role</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.roles.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Nom du role</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                id="name" placeholder="Entrer le nom du role" value="{{ old('name') }}"
                                autocomplete="name" required autofocus>

                            @error('name')
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
