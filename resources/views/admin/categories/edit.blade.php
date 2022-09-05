@extends('layouts.admin')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1><small>{{ $category->name }}</small></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Catégorie</a></li>
                                <li class="active">Modifier</li>
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
                <div class="card-header">Modifier</div>
                <div class="card-body card-block">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="post" class="">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name" class=" form-control-label">Nom de la catégorie</label>
                            <input type="text" id="name" placeholder="Entrer le nom du role" name="name"
                                value="{{ $category->name }}" class="form-control @error('name') is-invalid @enderror"
                                autocomplete="name" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-secondary btn-sm">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
