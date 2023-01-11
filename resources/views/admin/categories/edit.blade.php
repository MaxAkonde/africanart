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
                <h5 class="card-title mb-0">Modifier {{ $category->name }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="name">Nom de la catégorie</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" placeholder="Entrer le nom de la catégorie" value="{{ $category->name }}"
                            placeholder="Entrer le nom de la catégorie" autocomplete="name" required autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="d-block form-label" for="image">Image à la une</label>
                        <img src="@if ($category->image) {{ asset('assets/categories/' . $category->image) }} @else https://via.placeholder.com/200 @endif" class="img-thumbnail mb-2" alt="Image à la une"
                            style="height: 200px;width: 200px">
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
