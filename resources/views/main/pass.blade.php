    <nav class="navbar navbar-expand-lg px-5 bg-dark position-relative mb-5">
        <div class="col col-nav d-flex justify-content-center">
            <a href="/main"><h1 class="brand-name"><strong><em>YourGym</em></strong></h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="navbar-icon-fa fa-solid fa-bars"></i>
            </button>
        </div>
        {{-- <div class="col-0">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav gap-5">
                    <li class="nav-item">
                        <a class="nav-link fs-4" href="#home">Start</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4" href="#">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4" href="#offert">Oferta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4" href="#">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4" href="{{ url('/') }}">Sklep</a>
                    </li>

                    @guest
                        <li class="nav-item main-btn">
                            <a class="nav-link fs-4" href="{{ route('login') }}">Zaloguj się</a>
                        </li>
                    @else

                        <li class="nav-item dropdown main-btn">
                                <a class="nav-link dropdown-toggle fs-4 " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Profil</a></li>

                                <li><a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('main.nav.logout') }}</a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div> --}}
    </nav>
    <div class="container pass-container d-flex justify-content-center align-items-center gap-5">
        {{-- <div class="row">
            @guest
                <li class="nav-item main-btn">
                    <a class="nav-link fs-4" href="{{ route('login') }}">Zaloguj się</a>
                </li>
            @else
                <div class="container">
                    <p>Cześć <strong>{{ Auth::user()->name }}</strong>! Wybierz swój rodzaj karnetu</p>
                    <form action="">
                        @csrf
                        <div class="mb-3">
                            <label for="typ-karnetu" class="form-label" hidden>Typ karnetu</label>
                            <select class="form-select" id="typ-karnetu" required>
                            <option value="" disabled selected>Wybierz typ karnetu</option>
                                @foreach ($passTypes as $passtype)
                                    <option value="{{ $passtype->id }}">{{ $passtype->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Zatwierdź</button>
                    </form>
                </div>
            @endguest
        </div>
        <div class="row">
            <form method="post" action="{{ route('main.verifyUser') }}" id="verifyUserForm">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Imię</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="surname" class="col-md-4 col-form-label text-md-end">Nazwisko</label>

                    <div class="col-md-6">
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">Hasło</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Powtórz hasło</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">Numer telefonu</label>

                    <div class="col-md-6">
                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="start-date" class="col-md-4 col-form-label text-md-end">Wybierz start karnetu</label>

                    <div class="col-md-6">
                        <input id="start-date" type="date" class="form-control @error('start-date') is-invalid @enderror" name="start-date" value="{{ old('start-date') }}" required>

                        @error('start-date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            <div class="mb-3">
                <label for="typ-karnetu" class="form-label">Typ karnetu</label>
                <select class="form-select" id="typ-karnetu" required>
                <option value="" disabled selected>Wybierz typ karnetu</option>
                    @foreach ($passTypes as $passtype)
                        <option value="{{ $passtype->id }}">{{ $passtype->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Zatwierdź</button>
            </form>
        </div> --}}

        @guest
            <div class="">
                <span class="h1">By wykupic karnet musisz posiadać konto</span>
                <div class="">
                    <a class="nav-link fs-4 text-dark" href="{{ route('login') }}">Zaloguj się</a>
                        lub
                    <a class="nav-link fs-4 text-dark" href="{{ route('register') }}">Zarejestruj się</a>
                </div>
            </div>
        @else
            @if (Auth::user()->pass_type_id == NULL)
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Cześć <strong>{{ Auth::user()->name }}</strong>! Wybierz swój rodzaj karnetu</p>
                            <form action="{{ route('main.store', $user->id) }}">
                                {{ method_field('PUT') }}
                                @csrf
                                <div class="mb-3">
                                    <label for="typ-karnetu" class="form-label" hidden>Typ karnetu</label>
                                    <select class="form-select @error('passType') is-invalid @enderror" id="typ-karnetu" name="passType" required>
                                            <option value="" disabled selected>Wybierz typ karnetu</option>
                                        @foreach ($passTypes as $passtype)
                                            <option value="{{ $passtype->id }}">{{ $passtype->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('passType')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pass-start-date" class="form-label">Start karnetu:</label>
                                    <input type="date" name="passStartDate" id="pass-start-date" class="form-control @error('passStartDate') is-invalid @enderror" required>

                                    @error('passStartDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                
                                <button type="submit" class="btn btn-primary mt-3">Zatwierdź</button>
                            </form>
                        </div>
                        <div class="col-md-6 card_container">

                        </div>
                    </div>
                </div>
            @else
                <p>Cześć <strong>{{ Auth::user()->name }}</strong>! Twój rodzaj karnetu to: {{ Auth::user()->PassType->name }}</p>
            @endif
        @endguest


    </div>
    
@vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/main.css', 'resources/js/main.js'])