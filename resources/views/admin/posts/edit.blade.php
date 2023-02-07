@extends('layouts.admin')

@section('extra-css')
    <style>
        img.img-thumbnail {
            cursor: pointer;
        }
    </style>
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#description',
            toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify |' +
                'bullist numlist checklist outdent indent | removeformat | code table help'
        })
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Modifier {{ $post->title }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="title">Titre</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                                id="title" placeholder="Entrer l'intituler" value="{{ $post->title }}"
                                autocomplete="title" required autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="topic_id">Sujet</label>

                            <select name="topic_id" id="topic_id"
                                class="form-control @error('topic_id') is-invalid @enderror">
                                <option value="">--- Choisissez un sujet ---</option>
                                @foreach ($topics as $topic)
                                    <option value="{{ $topic->id }}" @if ($topic->id === $post->topic_id) selected @endif>
                                        {{ $topic->name }}</option>
                                @endforeach
                            </select>

                            @error('topic_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>

                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $post->description }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="d-block form-label" for="image">Image à la une</label>
                            <img src="@if ($post->image) {{ asset('assets/posts/' . $post->image) }} @else https://via.placeholder.com/200 @endif"
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
                            <button type="submit" class="btn btn-lg btn-primary">Enregistrer</button>
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
