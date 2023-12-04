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
                        <th scope="col">Data</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Status zamówienia</th>
                        <th scope="col">Produkty</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                            <td>{{ $order->price }} zł</td>
                            <td>
                                @if ($order->payment)
                                    {{ $order->payment->status }}
                                @else
                                    Brak informacji o płatności
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    @foreach ($order->products as $product)
                                        <span>{{ $product->name }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#orderDetails{{ $order->id }}" aria-expanded="false" aria-controls="orderDetails{{ $order->id }}">
                                    Więcej informacji
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <div class="collapse w-100" id="orderDetails{{ $order->id }}">
                                    <div class="card card-body">
                                        <div class="col">
                                            <div class="row">
                                                <div class="d-flex">
                                                    <div class="row d-flex col-6 .col-md-4">
                                                        <span class="h3">Adres do wysyłki</span>
                                                        @foreach ($order->userOrderData as $userData)
                                                            <span>{{ $userData->name }} {{ $userData->surname }}</span>
                                                            <span>{{ $userData->full_address }}</span>
                                                            <span>{{ $userData->zip_code }} {{ $userData->city }}</span>
                                                            <span>{{ $userData->phone_number }}</span>
                                                            <span>{{ $userData->email }}</span>
                                                        @endforeach
                                                    </div>
                                                    <div class="row d-flex col-md-8">
                                                        @foreach ($order->products as $product)
                                                            <span class="d-flex align-items-center">
                                                                <img src="{{ asset('storage/' . $product->image_path) }}" class="img-thumbnail  orders-image" alt="">
                                                                {{ $product->name }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
