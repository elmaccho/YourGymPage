@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h1>Lista produktów</h1>
        </div>
        <div class="col d-flex justify-content-end">
            <a class="" href="{{ route("products.create") }}">
                <button class="btn btn-primary">Dodaj</button>
            </a>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Opis</th>
                <th scope="col">Ilość</th>
                <th scope="col">Cena</th>
                <th scope="col">Akcje</th>
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
                            <button class="btn btn-danger btn-sm delete" data-id="{{ $product->id }}">x</button>
                            <a href="{{ route('products.edit', $product->id) }}">
                                <button class="btn btn-success btn-sm">e</button>
                            </a>
                            <a href="{{ route('products.show', $product->id) }}">
                                <button class="btn btn-warning btn-sm">p</button>
                            </a>
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
@endsection
@section('js-files')
    @vite('resources/js/delete.js');
@endsection