@extends('layouts.admin')

@section('extra-css')
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Ajouter une variante du produit {{ $product->title }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.products.attr.store', $product) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="attribute_id">Attribut</label>

                            <select name="attribute_id" id="attribute_id"
                                class="form-control @error('attribute_id') is-invalid @enderror">
                                <option value="">--- Choisissez un attribut ---</option>
                                @foreach ($attributes as $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                @endforeach
                            </select>

                            @error('attribute_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="mt-3">
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-lg btn-primary">Ajouter</button>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-lg btn-secondary">Terminer</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <td>Attribut</td>
                                    <td>Valeur(s)</td>
                                    <td>Prix</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product->attributes as $attribute)
                                    <form action="{{ route('admin.products.value.store', $product) }}" method="POST"
                                        class="valueForm">
                                        @csrf
                                        <tr>
                                            <td>
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                {{ $attribute->name }}
                                            </td>
                                            <td>
                                                <select name="values[]" multiple="" class="form-control">

                                                    @foreach ($attribute->values as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if (in_array($item->id, $selected_id)) selected @endif>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" name="price"
                                                    placeholder="Le prix" required
                                                    value="{{ $attribute->pivot->price ? $attribute->pivot->price : 0 }}"
                                                    autocomplete="price">
                                            </td>
                                            <td>
                                                <button title="Enregister" type="submit">
                                                    <i class="align-middle me-1" data-feather="save"></i></button>
                                                <a href="{{ route('admin.products.attr.value.delete', [$product, $attribute->id]) }}"
                                                    style="color: red" class="deleteButton">
                                                    <i class="align-middle me-1" data-feather="trash"></i>
                                                </a>
                                                <input type="hidden" name="attribute_id" value="{{ $attribute->id }}">
                                            </td>
                                        </tr>
                                    </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script>
        jQuery(document).ready(function($) {
            // $('a.deleteButton').click(function(e) {
            //     e.preventDefault
            //     console.log($(this).next());
            // });
        });
    </script>
@endsection
