@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('shop.product.show_title') }}</div>

                <div class="card-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('shop.product.fields.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" maxlength="500" class="form-control" name="name" value="{{ $product->name }}" required autocomplete="name" autofocus disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('shop.product.fields.description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" maxlength="1500" class="form-control" name="description" autofocus disabled>{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('shop.product.fields.amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" min="0" class="form-control" name="amount" value="{{ $product->amount }}" required autocomplete="amount" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('shop.product.fields.price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01" min="0" class="form-control" name="price" value="{{ $product->price }}" required autocomplete="price" disabled>
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-6">
                                @if (!is_null($product->image_path))
                                    <img src="{{ asset('storage/' . $product->image_path) }}" class="form-control @error('image') is-invalid @enderror" alt="Zdjęcie produktu">
                                @endif

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
