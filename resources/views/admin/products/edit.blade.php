@extends('layouts.admin')

@section('extra-css')
    <style>
        img.img-thumbnail {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Modifier {{ $product->name }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.products.update', $product) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label" for="type_id">Type de produit</label>

                            <select name="type_id" id="type_id" required
                                class="form-control @error('type_id') is-invalid @enderror">
                                <option value="">--- Choisissez le type de produit ---</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @if($product->type_id == $type->id) selected @endif>{{ $type->name }}</option>
                                @endforeach
                            </select>

                            @error('type_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="title">Titre</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                                id="title" placeholder="Entrer le titre du produit" value="{{ $product->title }}"
                                autocomplete="title" required autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="category_id">Catégorie</label>

                            <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">--- Choisissez une catégorie ---</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}" @if ($categorie->id === $product->category_id) selected @endif>
                                        {{ $categorie->name }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3" id="priceLayout">
                            <label class="form-label" for="price">Price</label>
                            <input class="form-control @error('price') is-invalid @enderror" type="number" name="price"
                                id="price" placeholder="Entrer le prix du produit" value="{{ $product->price ? $product->price : 0 }}"
                                autocomplete="price" autofocus>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="short_description">Description courte</label>
                            <textarea name="short_description" id="short_description" name="short_description"
                                class="form-control @error('short_description') is-invalid @enderror" cols="30" rows="4" required>{{ $product->short_description }}</textarea>

                            @error('short_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="long_description">Description longue</label>
                            <textarea name="long_description" id="long_description" name="long_description"
                                class="form-control @error('long_description') is-invalid @enderror" cols="30" rows="10" required>{{ $product->long_description }}</textarea>

                            @error('long_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="d-block form-label" for="image">Image à la une</label>
                            <img src="@if ($product->image) {{ asset('assets/products/' . $product->image) }} @else https://via.placeholder.com/200 @endif"
                                class="img-thumbnail mb-2" alt="Image à la une" style="height: 200px;width: 200px">
                            <input type="file" id="image" name="image" style="display: none"
                                class="form-control-file @error('image') is-invalid @enderror">

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">Modifier</button>
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

            var type_id = $('select#type_id').val();

            if(type_id > 1) {
                $("div#priceLayout").css('display', 'none');
            } else {
                $("div#priceLayout").css('display', 'block');
            }

            $('#image').on('change', function(e) {
                //alert('1');
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" ||
                        ext == "jpg")) {
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

            $("select#type_id").on('change', function(e) {
                if($(this).val() > 1) {
                    $("div#priceLayout").css('display', 'none');
                } else {
                    $("div#priceLayout").css('display', 'block');
                }
            });
        });
    </script>
@endsection
