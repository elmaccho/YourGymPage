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
                                                        </div>
                                                        <div class="cart_item_price cart_info_col">
                                                            <div class="cart_item_title">Price [PLN]</div>
                                                            <div class="cart_item_text">{{ $item->getPrice() }}</div>
                                                        </div>
                                                        <div class="cart_item_total cart_info_col">
                                                            <div class="cart_item_title">Total [PLN]</div>
                                                            <div class="cart_item_text">{{ $item->getSum() }}</div>
                                                        </div>
                                                        <div class=cart_info_col">
                                                            <button type="button" class="btn btn-danger btn-sm delete " data-id="{{ $item->getProductId() }}">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="order_total">
                                    <div class="order_total_content text-md-right">
                                        <div class="order_total_title">Order Total [PLN]:</div>
                                        <div class="order_total_amount">{{ $cart->getSum() }}</div>
                                    </div>
                                </div>
                                <div class="cart_buttons"> 
                                    <a href="/" type="button" class="button cart_button_clear">Powrót do sklepu</a> 
                                    <button type="submit" class="button cart_button_checkout" {{ !$cart->hasItems() ? 'disabled': '' }}>Zapłać</button> </div>
                                </div>
                            </form>
                        @endif
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
@endsection
