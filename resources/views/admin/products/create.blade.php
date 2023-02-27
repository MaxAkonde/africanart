@extends('layouts.admin')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">

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
                    <h5 class="card-title mb-0">Ajouter un produit</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="title">Titre</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                                id="title" placeholder="Entrer le titre du produit" value="{{ old('title') }}"
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
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="price">Price</label>
                            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price"
                                id="price" placeholder="Entrer le prix du produit" value="{{ old('price') }}"
                                autocomplete="price" required autofocus>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="short_description">Description courte</label>
                            <textarea name="short_description" id="short_description" name="short_description"
                                class="form-control @error('short_description') is-invalid @enderror" cols="30" rows="4" required></textarea>

                            @error('short_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="long_description">Description longue</label>
                            <textarea name="long_description" id="long_description" name="long_description"
                                class="form-control @error('long_description') is-invalid @enderror" cols="30" rows="10" required></textarea>

                            @error('long_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="d-block form-label" for="image">Image à la une</label>
                                <img src="https://via.placeholder.com/200" class="img-thumbnail mb-2" alt="Image à la une"
                                    style="height: 200px;width: 200px">
                                <input type="file" id="image" name="image" style="display: none"
                                    class="form-control-file @error('image') is-invalid @enderror">
    
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <label class="d-block form-label" for="attachement">Galerie</label>
                                <input type="file" name="attachment[]" id="attachment" multiple hidden>
                                <div class="multiple-uploader" id="multiple-uploader">
                                    <div class="mup-msg">
                                      <span class="mup-main-msg">Cliquez pour téléverser des photos.</span>
                                      <span class="mup-msg" id="max-upload-number">Téléverser jusqu'à 05 images</span>
                                      <span class="mup-msg">Seules les images sont autorisées.</span>
                                    </div>
                                  </div>
                            </div>
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

@section('extra-js')
    <script src="{{ asset('admin/js/multiple-uploader.js') }}"></script>

    <script>
        jQuery(document).ready(function($) {

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

            let multipleUploader = new MultipleUploader('#multiple-uploader').init({
                maxUpload : 5,
                // input name sent to backend
                filesInpName:'attachment', 
                // form selector
                formSelector: '#form', 
            });

        });
    </script>
@endsection
