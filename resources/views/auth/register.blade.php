@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row form-wrapper">
        <div class="col-md-5">
            <div class="card card-form">
                <div class="card-header text-center h1 m-3 text-light">{{ __('shop.register.register_title') }}</div>
                <div class="card-body">
                    <form class="form-body" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="fullname-wrapper">
                            <div class="row mb-3 form-row">
                                <label for="name" class="col-md-9 col-form-label text-md-start text-light">{{ __('shop.register.name') }}</label>
    
                                <div class="col-md-9">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3 form-row">
                                <label for="surname" class="col-md-9 col-form-label text-md-start text-light">{{ __('shop.register.surname') }}</label>
    
                                <div class="col-md-9">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
    
                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 form-row">
                            <label for="email" class="col-md-11 col-form-label text-md-start text-light">{{ __('shop.register.email') }}</label>

                            <div class="col-md-11">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-row">
                            <label for="phone_number" class="col-md-11 col-form-label text-md-start text-light">{{ __('shop.register.phone_number') }}</label>

                            <div class="col-md-11">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-row">
                            <label for="password" class="col-md-11 col-form-label text-md-start text-light">{{ __('shop.register.password') }}</label>

                            <div class="col-md-11">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4 form-row">
                            <label for="password-confirm" class="col-md-11 col-form-label text-md-start text-light">{{ __('shop.register.confirm_password') }}</label>

                            <div class="col-md-11">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 w-100">
                                <button type="submit" class="btn btn-lg btn-main text-light">
                                    {{ __('shop.register.register_btn') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@vite('resources/css/auth.css')
