<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YourGym</title>
    <script src="https://kit.fontawesome.com/4798a03daf.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg px-5">
        <div class="col">
            <h1 class="brand-name"><strong><em>YourGym</em></strong></h1>
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
                        <li class="nav-item main-btn">
                            <a class="nav-link fs-4" href="{{ route('login') }}">Zaloguj się</a>
                        </li>
                    @else
    
                        <li class="nav-item dropdown main-btn">
                                <a class="nav-link dropdown-toggle fs-4 " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
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
    <section id="home" class="d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 d-flex align-items-center flex-column gap-5">
              <h2 class="main-title"><strong><span class="inner-main-text">Nie bój się</span> być początkującym!</strong></h2>
              <a href="#" class="btn btn-lg main-btn sign-up-btn">Zapisz się</a>
            </div>
          </div>
        </div>
    </section>
    <section id="offert">
        <div class="card-row ">
            <div class="card-wrapper card-gym">
                
                <span class="FontAwesomeIcon z-1"><i class="fa-solid fa-dumbbell"></i></span>
                <strong class="z-1"><h3 class="inner-main-text h1">Siłownia</h3></strong>
                <p class="lead text-light w-75 h-25 text-center z-1">Najnowocześniejszy sprzęt i fachowi trenerzy</p>

                <a class="btn read-more-btn z-1" href="#">Czytaj więcej</a>

                <div class="card-background"><img class="card-photo" src="{{ url('images/fitness-3502830_1280.jpg') }}" alt=""></div>
            </div>
            <div class="card-wrapper card-fitness">
                <div class="card-background"></div>
                <span class="FontAwesomeIcon"><i class="fa-solid fa-child-reaching"></i></span>
                <strong><h3 class="inner-main-text h1">Fitness</h3></strong>
                <p class="lead text-light w-75 h-25 text-center">Wdzięk i delikatność Zumba, Joga, Pilates, Step i inne zajęcia</p>

                <a class="btn read-more-btn" href="#">Czytaj więcej</a>
            </div>
            <div class="card-wrapper card-squash">
                <div class="card-background"></div>
                <span class="FontAwesomeIcon"><i class="fa-solid fa-baseball"></i></span>
                <strong><h3 class="inner-main-text h1">Squasz</h3></strong>
                <p class="lead text-light w-75 h-25 text-center">Tenis inaczej. Ekskluzywny sport na wyciągnięcie rakiety</p>

                <a class="btn read-more-btn" href="#">Czytaj więcej</a>
            </div>
        </div>
        <div class="card-row ">
            <div class="card-wrapper card-indoor-cycling">
                <div class="card-background"></div>
                <span class="FontAwesomeIcon"><i class="fa-solid fa-person-biking"></i></span>
                <strong><h3 class="inner-main-text h1">Indoor cycling</h3></strong>
                <p class="lead text-light w-75 h-25 text-center">Najnowocześniejszy sprzęt i fachowi trenerzy</p>

                <a class="btn read-more-btn" href="#">Czytaj więcej</a>
            </div>
            <div class="card-wrapper card-relax">
                <div class="card-background"></div>
                <span class="FontAwesomeIcon"><i class="fa-solid fa-bed"></i></span>
                <strong><h3 class="inner-main-text h1">Strefa relaksu</h3></strong>
                <p class="lead text-light w-75 h-25 text-center">Odpoczynek połączony z relaksem w świetnej aranżacji</p>

                <a class="btn read-more-btn" href="#">Czytaj więcej</a>
            </div>
            <div class="card-wrapper card-health">
                <div class="card-background"></div>
                <span class="FontAwesomeIcon"><i class="fa-solid fa-notes-medical"></i></span>
                <strong><h3 class="inner-main-text h1">Zdrowie</h3></strong>
                <p class="lead text-light w-75 h-25 text-center">Monitory LCD i bieżąca kontrola treningu</p>

                <a class="btn read-more-btn" href="#">Czytaj więcej</a>
            </div>
        </div>
    </section>

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @vite('resources/css/main.css')
</body>
</html>