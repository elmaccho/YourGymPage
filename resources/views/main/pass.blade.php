<nav class="navbar navbar-expand-lg px-5 bg-dark">
    <div class="col col-nav">
        <a href="/main"><h1 class="brand-name"><strong><em>YourGym</em></strong></h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="navbar-icon-fa fa-solid fa-bars"></i>
        </button>
    </div>
    <div class="col-0">
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
    </div>
</nav>
<div class="container pass-container">
    <form>
      <div class="mb-3">
        <label for="imie" class="form-label">Imię</label>
        <input type="text" class="form-control" id="imie" required>
      </div>
      <div class="mb-3">
        <label for="nazwisko" class="form-label">Nazwisko</label>
        <input type="text" class="form-control" id="nazwisko" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Hasło</label>
        <input type="password" class="form-control" id="nazwisko" required>
      </div>
      <div class="mb-3">
        <label for="nazwisko" class="form-label">Powtórz hasło</label>
        <input type="password" class="form-control" id="nazwisko" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Adres e-mail</label>
        <input type="email" class="form-control" id="email" required>
      </div>
      <div class="mb-3">
        <label for="telefon" class="form-label">Numer telefonu</label>
        <input type="tel" class="form-control" id="telefon" required>
      </div>
      <div class="mb-3">
        <label for="data-urodzenia" class="form-label">Data urodzenia</label>
        <input type="date" class="form-control" id="data-urodzenia" required>
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
</div>
@vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/main.css', 'resources/js/main.js'])