<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YourGym</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg px-5">

        <div class="col">
            <h1><strong><em>YourGym</em></strong></h1>
        </div>
        <div class="col-0">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav gap-5">
                    <li class="nav-item">
                        <a class="nav-link fs-4" href="#">Start</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4" href="#">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4" href="#">Oferta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4" href="#">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4" href="{{ url('/') }}">Sklep</a>
                    </li>
    
                    @guest
                        <li class="nav-item">
                            <a class="nav-link fs-4" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @else
    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fs-4" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('main.nav.logout') }}</a></li>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endguest
    
                </ul>
            </div>
        </div>
    </nav>
    

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</body>
</html>