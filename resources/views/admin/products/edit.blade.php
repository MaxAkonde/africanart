@extends('layouts.admin')

@section('extra-css')
    <style>
        img.img-thumbnail {
            cursor: pointer;
        }
    </style>
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1><small>{{ $product->name }}</small></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Produits</a></li>
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
                    <form action="{{ route('admin.products.update', $product) }}" method="post" class="" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title" class=" form-control-label">Titre</label>
                            <input type="text" id="title" name="title" value="{{ $product->title }}"
                                class="form-control @error('title') is-invalid @enderror" autocomplete="title" required
                                autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id" class=" form-control-label">Catégorie</label>
                            <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">--- Choisissez une catégorie ---</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}" @if ($categorie->id === $product->category_id) selected @endif>{{ $categorie->name }}</option>
                                @endforeach
                            </select>

                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price" class=" form-control-label">Prix</label>
                            <input type="text" id="price" name="price" value="{{ $product->price }}"
                                class="form-control @error('price') is-invalid @enderror" autocomplete="price" required>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="short_description" class=" form-control-label">Description courte</label>
                            <textarea name="short_description" id="short_description" name="short_description"
                                class="form-control @error('short_description') is-invalid @enderror" cols="30" rows="4" required>{{ $product->short_description }}</textarea>

                            @error('short_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="long_description" class=" form-control-label">Description longue</label>
                            <textarea name="long_description" id="long_description" name="long_description"
                                class="form-control @error('long_description') is-invalid @enderror" cols="30" rows="10" required>{{ $product->long_description }}</textarea>

                            @error('long_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image" class="d-block">Image à la une</label>
                            <img src="@if($product->image) {{ asset('assets/products/'. $product->image) }} @else https://via.placeholder.com/200 @endif" class="img-thumbnail mb-2" alt="Image à la une"
                                style="height: 200px;width: 200px">
                                <input type="file" id="image" name="image" class="form-control-file @error('image') is-invalid @enderror">

                            @error('image')
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

@section('extra-js')
    <script>
        jQuery(document).ready(function($) {

            $('#image').on('change', function(e) {
                //alert('1');
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('img.img-thumbnail').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('img.img-thumbnail').attr('src', 'https://via.placeholder.com/200');
                }
            });

            $("img.img-thumbnail").click(function() {
                $("#image").click();
            });
        });
    </script>
@endsection
