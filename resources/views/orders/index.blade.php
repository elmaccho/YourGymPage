@extends('layouts.app')

@section('content')
<div class="container">
    @include('helpers.flash-messages')
    <div class="row">
        <div class="col-10">
            <h1> {{ __('shop.orders.index_title') }}</h1>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ilość</th>
                    <th scope="col">Cena [PLN]</th>
                    <th scope="col">Produkty</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td scope="row">{{ $order->id }}</td>
                        <td scope="row">{{ $order->quantity }}</td>
                        <td scope="row">{{ $order->price }}</td>
                        @foreach ($order->products as $product)
                        <td scope="row">
                            <ul>
                                <li>
                                    <img src="{{ asset('storage/' . $product->image_path) }}" class="img-fluid img-thumbnail w-1 mx-auto d-block" alt="">
                                    {{ $product->name }}
                                </li>
                            </ul>
                        </td>
                        
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $orders->links() }}
</div>
@endsection
