@extends('layouts.app')

@section('css-files')
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
@endsection

@section('content')
<div class="container">
    @include('helpers.flash-messages')

    <div class="row">
        <div class="col-10">
            <h1> {{ __('shop.orders.index_title') }}</h1>
        </div>
    </div>
    
    <div class="row">
        @if ($orders->isEmpty())
            <p>Nie zrealizowano jeszcze żadnych zamówień</p>
        @else
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
                            <td scope="row">
                            @foreach ($order->products as $product)
                                <ul>
                                    <li class="d-flex">
                                        <img src="{{ asset('storage/' . $product->image_path) }}" class="img-fluid img-thumbnail d-block" alt="">
                                        {{ $product->name }}
                                    </li>
                                </ul>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    {{ $orders->links() }}
</div>
@endsection
