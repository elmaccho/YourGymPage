<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/4798a03daf.js" crossorigin="anonymous"></script>
    
    {{-- cart css --}}
    @yield('css-files')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm nav-wrapper">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse nav-bar" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <a href="{{ route('main.index') }}">Powrót na stronę główną</a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <div class="d-flex auth-wrapper">
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="{{ route('login') }}">{{ __('shop.nav.login') }}</a>
                                    </li>
                                @endif
    
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="{{ route('register') }}">{{ __('shop.nav.register') }}</a>
                                    </li>
                                @endif
                            </div>
                        @else
                            <li class="nav-item dropdown navbar-r">
                                <a class="nav-link dropdown-item text-light" href="{{ route('cart.index') }}">{{ __('Koszyk') }}</a>

                                <div class="dropdown-wrapper">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-end user-dropdown" aria-labelledby="navbarDropdown">                                      
                                        <a class="dropdown-item" href="{{ route('orders.index') }}">{{ __('Zamówienia') }}</a>
    
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('shop.nav.logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                
                                @can('isAdmin')
                                <div class="dropdown-wrapper">
                                    <a id="navbarDropdown admin-dropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Panel Administracyjny
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="admin-dropdown">                                      
                                        <a class="dropdown-item" href="{{ route('users.index') }}">{{ __('shop.nav.users') }}</a>
                                        <a class="dropdown-item" href="{{ route('products.index') }}">{{ __('shop.nav.products') }}</a>
                                    </div>
                                </div>
                                @endcan
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/layouts.css', 'resources/css/shop.css'])
        <script type="text/javascript">
            @yield('javascript')
        </script>
            @yield('js-files')
</body>
</html>
