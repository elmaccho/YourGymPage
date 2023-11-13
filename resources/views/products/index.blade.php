@extends('layouts.app')

@section('content')
<div class="container">
    @include('helpers.flash-messages')
    <div class="row">
        <div class="col-10">
            <h1> {{ __('shop.product.index_title') }}</h1>
        </div>
        <div class="col d-flex justify-content-end">
            <a class="" href="{{ route("products.create") }}">
                <button class="btn btn-primary">{{ __('shop.button.add') }}</button>
            </a>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('shop.product.fields.name') }}</th>
                    <th scope="col">{{ __('shop.product.fields.description') }}</th>
                    <th scope="col">{{ __('shop.product.fields.amount') }}</th>
                    <th scope="col">{{ __('shop.product.fields.price') }}</th>
                    <th scope="col">{{ __('shop.product.fields.category') }}</th>
                    <th scope="col">{{ __('shop.product.fields.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->amount }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            @if ($product->hasCategory())
                                {{ $product->category->name }}
                            @endif
                        </td>
                        <td class="col-1">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-danger btn-sm delete " data-id="{{ $product->id }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                <a href="{{ route('products.edit', $product->id) }}">
                                    <button class="btn btn-success btn-sm ">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </a>
                                <a href="{{ route('products.show', $product->id) }}">
                                    <button class="btn btn-primary btn-sm ">
                                        <i class="fa-solid fa-eye text-white"></i>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $products->links() }}
</div>
@endsection
@section('javascript')
    const deleteUrl = "{{ url('products') }}/";
    const confirmDelete = "{{ __('shop.messages.delete_title') }}";
    const moreInfoDelete = "{{ __('shop.messages.delete_more_info') }}";
    const deleteAgree = "{{ __('shop.messages.delete_agree') }}";
    const deleteCancel = "{{ __('shop.messages.delete_cancel') }}";
@endsection
@section('js-files')
    @vite('resources/js/delete.js');
@endsection