@extends('layouts.admin')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Nouvel Utilisateur</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Utilisateur</a></li>
                                <li class="active">Ajouter</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Ajouter un utilisateur</div>
                <div class="card-body card-block">
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
                                            <div class="checkbox">
                                                <label for="{{ $role->slug }}" class="form-check-label ">
                                                    <input type="checkbox" id="{{ $role->slug }}" name="roles[]"
                                                        value="{{ $role->id }}"
                                                        class="form-check-input">{{ $role->name }}
                                                </label>
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
