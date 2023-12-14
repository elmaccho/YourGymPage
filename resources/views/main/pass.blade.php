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
        @include('helpers.flash-messages')

        @guest
            Aby wykupić karnet musisz być zalogowany! <br>

                <a class="nav-link fs-4 text-dark" href="{{ route('login') }}">Zaloguj się</a>
lub
                <a class="nav-link fs-4 text-dark" href="{{ route('register') }}">Zarejestruj się</a>

            @else
                @if (Auth::user()->pass_type_id == NULL)
                    <div class="container">
                        <div class="row">
                                    <div class="col-md-6">
                                        <p>Cześć <strong>{{ Auth::user()->name }}</strong>! Wybierz swój rodzaj karnetu</p>
                                        <form action="{{ route('main.update') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="typ-karnetu" class="form-label" hidden>Typ karnetu</label>
                                                <select class="form-select" id="typ-karnetu" name="passType" required>
                                                    <option value="" disabled selected>Wybierz typ karnetu</option>
                                                    @foreach ($passTypes as $passtype)
                                                        <option value="{{ $passtype->id }}">{{ $passtype->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="start-date" class="form-label">Data rozpoczęcia</label>
                                                <input type="date" class="form-control" name="passStartDate" id="start-date">
                                            </div>
        
                                            <button type="submit" class="btn btn-primary mt-3">Zatwierdź</button>
                                        </form>
                                    </div>
                                    <div class="col-md-6 card_container">
        
                                    </div>
                        </div>
                    </div>
                    @else
                    <div class="d-flex flex-column">
                    <p>Cześć <strong>{{ Auth::user()->name }}</strong>! Twój rodzaj karnetu to: {{ Auth::user()->PassType->name }}</p>
        
                                @if ($today < $passStartDate)
                                    @if ($passCalculations['remainingToPass'] < 0)
                                        <p>Karnet będzie ważny za {{ $passCalculations['remainingToPass'] }} dni.</p>
                                    @else
                                        <p id="passCountdown">Karnet będzie ważny za 
                                            <span class="passHoursCountdown">
                                                {{ $passCalculations['remainingHours'] }}
                                            </span> godzin 
                                            <span class="passMinutesCountdown">
                                                {{ $passCalculations['remainingMinutes'] }}
                                            </span> minut i 
                                            <span class="passSecondsCountdown">
                                                {{ $passCalculations['remainingSeconds'] }}
                                            </span>sekund.
                                        </p>
                                    @endif
                                @else
                                    <p>Karnet straci ważność za {{ $passCalculations['remainingDays'] }} dni.</p>
                                @endif
                    </div>
                @endif
        @endguest
    </div>
    
@vite([
    'resources/sass/app.scss', 
    'resources/js/app.js', 
    'resources/css/main.css', 
    'resources/js/main.js',
    'resources/js/passCountDown.js'
    ])
