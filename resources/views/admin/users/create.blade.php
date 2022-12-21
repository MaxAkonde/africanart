@extends('layouts.admin')

@section('breadcrumbs')
    <a class="navbar-brand" href="{{ route('admin.users.index') }}">Utilisateur</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Ajouter un utilisateur</h4>
                </div>
                <div class="content">
                    <form action="{{ route('admin.users.store') }}" method="post" class="">
                        @csrf

                        <fieldset>
                            <legend>Informations</legend>

                            <div class="form-group">
                                <label for="name" class=" form-control-label">Nom d'utilisateur</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
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
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror" autocomplete="email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Sécurité</legend>

                            <div class="form-group">
                                <label for="password" class=" form-control-label">Mot de passe</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" value="" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class=" form-control-label">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" id="password-confirm"
                                    name="password_confirmation" value="" required autocomplete="new-password">
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
                                                    name="roles[]" value="{{ $role->id }}">
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


                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-secondary btn-sm">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
