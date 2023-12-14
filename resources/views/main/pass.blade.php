    <nav class="navbar navbar-expand-lg px-5 bg-dark position-relative mb-5">
        <div class="col col-nav d-flex justify-content-center">
            <a class="btn" href="/main"><h1 class="brand-name"><strong><em>YourGym</em></strong></h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="navbar-icon-fa fa-solid fa-bars"></i>
            </button>
        </div>
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
        
                                            <a type="submit" class="btn btn-primary mt-3">Przejdź do płatności</a>
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
                            @if ($passCalculations['remainingDays'] > 0)
                                    <p>Karnet będzie ważny za {{ $passCalculations['remainingDays'] }} dni.</p>
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

                        @elseif ($today >= $passStartDate)
                            @if ($passCalculations['remainingDays'] > 0)
                                    <p>Karnet będzie ważny jeszcze przez: {{ $passCalculations['remainingDays'] }} dni.</p>
                                @else
                                    <p id="passCountdown">Karnet będzie ważny jeszcze przez:
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
