@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row form-wrapper">
            <div class="col-md-5">
                @include('helpers.flash-messages')
                <div class="card card-form">
                    <div class="card-header text-center h1 m-3 text-light">{{ __('shop.login.login_title') }}</div>

                    <div class="card-body">
                        <form class="form-body" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3 form-row">
                                <label for="email" class="col-md-9 col-form-label text-md-start text-light">{{ __('shop.login.email') }}</label>

                                <div class="col-md-9">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 form-row">
                                <label for="password" class="col-md-9 col-form-label text-md-start text-light">{{ __('shop.login.password') }}</label>

                                <div class="col-md-9">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-lg btn-main text-light">
                                        {{ __('shop.login.login_btn') }}
                            </button>

                            <div class="row mb-0">
                                <div class="form-check w-100 d-flex gap-1">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-light" for="remember">
                                        {{ __('shop.login.remember_me') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('shop.login.pass_remind') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@vite('resources/css/auth.css')