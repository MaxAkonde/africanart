@extends('layouts.admin')

@section('breadcrumbs')
    <a class="navbar-brand" href="{{ route('admin.users.index') }}">Utilisateur</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Modifier {{ $user->name }}</h4>
                </div>
                <div class="content">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="post" class="">
                        @csrf
                        @method('PUT')

                        <fieldset>
                            <legend>Informations</legend>

                            <div class="form-group">
                                <label for="name" class=" form-control-label">Nom d'utilisateur</label>
                                <input type="text" id="name" name="name" value="{{ $user->name }}"
                                    class="form-control @error('name') is-invalid @enderror" autocomplete="name" required
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class=" form-control-label">Email</label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}"
                                    class="form-control @error('email') is-invalid @enderror" autocomplete="email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Niveau</legend>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Rôles</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        @foreach ($roles as $role)
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="{{ $role->slug }}"
                                                name="roles[]" value="{{ $role->id }}"
                                                @foreach ($user->roles as $userRole) @if ($userRole->id === $role->id) checked @endif @endforeach>
                                            <label class="form-check-label"
                                                for="{{ $role->slug }}">{{ $role->name }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                    @error('roles')
                                        <span class="invalid-feedback" role="alert" style="display: block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        {{-- <div class="form-group">
                            <label for="name" class=" form-control-label">Nom du role</label>
                            <input type="text" id="name" placeholder="Entrer le nom du role" name="name"
                                value="{{ $role->name }}" class="form-control @error('name') is-invalid @enderror"
                                autocomplete="name" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-secondary btn-sm">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
