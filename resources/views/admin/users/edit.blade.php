@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Modifier {{ $user->name }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <legend>Information</legend>
                            <div class="mb-3">
                                <label class="form-label" for="name">Nom d'utilisateur</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    name="name" id="name" placeholder="Entrer le nom d'utilisateur'"
                                    value="{{ $user->name }}" autocomplete="name" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email"
                                    name="email" id="email" placeholder="Entrer l'email" value="{{ $user->email }}"
                                    autocomplete="email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Niveau</legend>
                            <div class="mb-3">
                                @foreach ($roles as $role)
                                    <label class="form-check" for="{{ $role->slug }}">
                                        <input class="form-check-input" id="{{ $role->slug }}" type="checkbox"
                                            name="roles[]" value="{{ $role->id }}"
                                            @foreach ($user->roles as $userRole) @if ($userRole->id === $role->id) checked @endif @endforeach>
                                        <span class="form-check-label">
                                            {{ $role->name }}
                                        </span>
                                    </label>
                                @endforeach

                                @error('roles')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </fieldset>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
