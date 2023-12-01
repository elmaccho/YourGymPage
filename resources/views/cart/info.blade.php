@extends('layouts.app')

@section('css-files')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('content')
<div class="container">
    @include('helpers.flash-messages')

    <div class="cart_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Shopping Cart<small> ({{ $cart->getItems()->count() }}) </small></div>
                        @if ($cart->isEmpty())
                            <p>Koszyk jest pusty</p>
                        @else
                            <form action="{{ route('orders.store') }}" method="POST" id="order-form">
                                @csrf
                                <div class="cart_items">
                                    <ul class="cart_list">
                                        @foreach ($cart->getItems() as $item)
                                            @if ($cart)
                                                
                                            @endif
                                            <li class="cart_item clearfix">
                                                <div class="cart_item_image">
                                                        @if (!is_null($item->getImagePath()))
                                                            <img src="{{ $item->getImage() }}" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                                                        @else

                                                        @endif
                                                    </div>
                                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between align-items-center">
                                                        <div class="cart_item_name cart_info_col">
                                                            <div class="cart_item_title">Name</div>
                                                            <div class="cart_item_text">{{ $item->getName() }}</div>
                                                        </div>
                                                        <div class="cart_item_quantity cart_info_col">
                                                            <div class="cart_item_title">Quantity</div>
                                                            <div class="cart_item_text">{{ $item->getQuantity() }}</div>
                                                            {{-- <input class="cart-quantity-input" type="number" name="" id="" value="{{ $item->getQuantity() }}"> --}}
                                                        </div>
                                                        <div class="cart_item_price cart_info_col">
                                                            <div class="cart_item_title">Price</div>
                                                            <div class="cart_item_text">{{ $item->getPrice() }} zł</div>
                                                        </div>
                                                        <div class="cart_item_total cart_info_col">
                                                            <div class="cart_item_title">Total</div>
                                                            <div class="cart_item_text">{{ $item->getSum() }} zł</div>
                                                        </div>
                                                    </div>
                                            </li>

                                            {{-- <button class="btn btn-primary btn-sm cart-update" type="button" data-product-id="{{ $item->getProductId() }}">Zaktualizuj koszyk</button> --}}
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="order_total">
                                    <div class="order_total_content text-md-right">
                                        <div class="order_total_title">Order Total:</div>
                                        <div class="order_total_amount">{{ $cart->getSum() }} zł</div>
                                    </div>
                                </div>
                                <div class="cart_buttons"> 
                                    <a href="{{ route('cart.index') }}" type="button" class="button cart_button_clear">Wróć</a> 
                                    <button class="button cart_button_checkout" {{ !$cart->hasItems() ? 'disabled': '' }}>Kupuję i płacę</button> </div>
                                </div>
                            </form>
                        @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h2>Formularz danych do wysyłki</h2>
                    <form>
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="mb-3">
                            <label for="inputImie" class="form-label">Imię</label>
                            <input type="text" class="form-control" id="inputImie" placeholder="Wprowadź swoje imię" required value="{{ $user->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="inputNazwisko" class="form-label">Nazwisko</label>
                            <input type="text" class="form-control" id="inputNazwisko" placeholder="Wprowadź swoje nazwisko" required value="{{ $user->surname }}">
                        </div>
                        <div class="mb-3">
                            <label for="inputAdres" class="form-label">Adres</label>
                            <input type="text" class="form-control" id="inputAdres" placeholder="Wprowadź swój adres" required value="{{ $user->address->city }} {{ $user->address->street_no }}">
                        </div>
                        <div class="mb-3">
                            <label for="inputMiasto" class="form-label">Miasto</label>
                            <input type="text" class="form-control" id="inputMiasto" placeholder="Wprowadź swoje miasto" required value="{{ $user->address->city }}">
                        </div>
                        <div class="mb-3">
                            <label for="inputKodPocztowy" class="form-label">Kod pocztowy</label>
                            <input type="text" class="form-control" id="inputKodPocztowy" placeholder="Wprowadź kod pocztowy" required value="{{ $user->address->zip_code }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Wyślij</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascript')
    const deleteUrl = "{{ url('cart') }}/";
    const confirmDelete = "{{ __('shop.messages.delete_title') }}";
    const moreInfoDelete = "{{ __('shop.messages.delete_more_info') }}";
    const deleteAgree = "{{ __('shop.messages.delete_agree') }}";
    const deleteCancel = "{{ __('shop.messages.delete_cancel') }}";
@endsection
@section('js-files')
    @vite('resources/js/delete.js')
    @vite('resources/js/cart.js')
@endsection
