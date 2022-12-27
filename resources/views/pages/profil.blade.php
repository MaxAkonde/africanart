@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Modifier votre profil</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Profil</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-fluid pt-5">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="contact-form">
                <h4 class="font-weight-semi-bold mb-4">Information personnelle</h4>
                <form action="{{ route('update.user.profil', $user) }}" method="POST" novalidate="novalidate">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Nom</label>
                            <input class="form-control @error('fname') is-invalid @enderror" id="first"
                                placeholder="Nom" name="fname" value="{{ $user->fname ? $user->fname : old('fname') }}"
                                type="text">
                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Prénom</label>
                            <input class="form-control form-control @error('lname') is-invalid @enderror" type="text"
                                id="last" name="lname" placeholder="Prénom"
                                value="{{ $user->lname ? $user->lname : old('lname') }}">
                            @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Entreprise</label>
                            <input class="form-control @error('company') is-invalid @enderror" type="text" id="text"
                                placeholder="Numéro *" name="company"
                                value="{{ $user->company ? $user->company : old('company') }}">
                            @error('company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Pseudo</label>
                            <input class="form-control" type="text" id="text" value="{{ $user->name }}" readonly
                                disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="email" id="email" value="{{ $user->email }}"
                                name="email" readonly disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Téléphone</label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" id="number"
                                placeholder="Numéro *" name="phone"
                                value="{{ $user->phone ? $user->phone : old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Adresse 01</label>
                            <input class="form-control @error('address1') is-invalid @enderror" type="text"
                                id="add1" name="address1" placeholder="Adresse 01 *"
                                value="{{ $user->address1 ? $user->address1 : old('address1') }}">
                            @error('address1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Adresse 02</label>
                            <input class="form-control" type="text" placeholder="123 Street" name="address2"
                                value="{{ $user->address2 ? $user->address2 : old('addresse2') }}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Pays</label>
                            <select class="custom-select" name="country_id">
                                @foreach ($countries as $item)
                                    <option {{ $user->country_id == $item->id ? 'selected' : null }}
                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ville/Commune</label>
                            <input class="form-control @error('city') is-invalid @enderror" type="text" id="city"
                                name="city" placeholder="Ville/Commune"
                                value="{{ $user->city ? $user->city : old('city') }}">
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Etat/Départment</label>
                            <input class="form-control @error('state') is-invalid @enderror" type="text"
                                id="state" name="state" placeholder="Etat/Département"
                                value="{{ $user->state ? $user->state : old('state') }}">
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3 col-md-12 form-group">
                            <button type="submit" value="submit" class="btn btn-primary btn-lg btn-block">Mettre à
                                jour</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
@endsection
