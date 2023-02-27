@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Ajouter un produit</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Ajouter votre produit</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        {{-- <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Contact pour toute question</span></h2>
        </div> --}}
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form action="{{ route('storeproduct') }}" id="addproduct" method="post" class=""
                        enctype="multipart/form-data">
                        @csrf
                        <div class="control-group">
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Titre du produit" required="required"
                                data-validation-required-message="Veuillez saisir votre title" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <select name="category_id" class="form-control" id="category_id" required="required">
                                <option value="">--- Choisissez une catégorie ---</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                            <p class="help-block text-danger"></p>
                            {{-- <input type="email" class="form-control" id="email" placeholder="Votre Email"
                                required="required" data-validation-required-message="Veuillez saisir votre email" />
                            <p class="help-block text-danger"></p> --}}
                        </div>
                        <div class="control-group">
                            <input type="text" name="price" class="form-control" id="price"
                                placeholder="Prix du produit" required="required"
                                data-validation-required-message="Veuillez saisir le prix du produit" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" name="short_description" rows="4" id="short_description"
                                placeholder="Courte description" data-validation-required-message="Veuillez saisir une courte description"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" name="long_description" rows="6" id="long_description"
                                placeholder="Longue description" data-validation-required-message="Veuillez saisir une longue description"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <input hidden type="file" id="image" name="image"
                            class="form-control-file @error('image') is-invalid @enderror">
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit"
                                id="sendMessageButton">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <label for="image" class="d-block">Image à la une</label>
                <img src="https://via.placeholder.com/400" class="img-thumbnail mb-2" alt="Image à la une"
                    style="height: 400px;width: 400px">
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection

@section('extra-js')
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
        });
    </script>
@endsection
