<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg px-5 bg-dark position-relative mb-5">
        <div class="col col-nav">
            <a class="btn" href="/main"><h1 class="brand-name"><strong><em>YourGym</em></strong></h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="navbar-icon-fa fa-solid fa-bars"></i>
            </button>
        </div>
        <div class="col-0">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav gap-5">
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
                </ul>
            </div>
        </div>
    </nav>

    @include('helpers.flash-messages')

    <div class="container profile-container mb-5">
        <div class="row d-flex gap-2">
          <div class="col-md-4 text-center profile-image-wrapper">
            @if (!is_null($user->image_path))
                    <img src="{{ asset('storage/'. $user->image_path) }}" alt="Profile" class="profile-image" data-bs-toggle="modal" data-bs-target="#zmianaZdjeciaModal">
                @else
                    <img src="{{ asset('storage/user/defaultUser.jpg') }}" alt="Profile" class="profile-image" data-bs-toggle="modal" data-bs-target="#zmianaZdjeciaModal">
            @endif
                <div class="profile-image-info">
                    Zmień zdjęcie profilowe
                </div>
          </div>
          <div class="col-md-5">
            <h2>{{ $user->name }}{{ $user->surname }}</h2>
            <p>Email: {{ $user->email }}</p>
            <p>Adres: {{ $user?->address?->city }} {{ $user?->address?->home_no }}, {{ $user?->address?->zip_code }}</p>
            <p>Dołączono {{ $user->email_verified_at->format('d/m/Y') }}</p>
          </div>
        </div>
    
        <div class="row mt-4">
          <div class="col-md-12">
            <h4>Informacje</h4>
            <table class="table">
              <tr>
                <th scope="row">Typ karnetu</th>
                <td>
                    @if ($user->pass_type_id == null)
                            ----
                        @else
                            <strong>{{ $user->passType->name }}</strong>
                    @endif
                </td>
              </tr>
              <tr>
                <th scope="row">Informacje o karnecie</th>
                <td>
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
                </td>
              </tr>
            </table>
          </div>
        </div>
    </div>

    <div class="container">
        @include('helpers.flash-messages')
    
        <div class="row">
            <div class="col-10">
                <h1>Historia zamówień</h1>
            </div>
        </div>
        
        <div class="row">
            @if ($orders->isEmpty())
                <p>Nie zrealizowano jeszcze żadnych zamówień</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Data</th>
                            <th scope="col">Cena</th>
                            <th scope="col">Status zamówienia</th>
                            <th scope="col">Produkty</th>
                            <th scope="col">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                                <td>{{ $order->price }} zł</td>
                                <td>
                                    @if ($order->payment)
                                        {{ $order->payment->status }}
                                    @else
                                        Brak informacji o płatności
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        @foreach ($order->products as $product)
                                            <span>{{ $product->name }}</span>
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#orderDetails{{ $order->id }}" aria-expanded="false" aria-controls="orderDetails{{ $order->id }}">
                                        Więcej informacji
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <div class="collapse w-100" id="orderDetails{{ $order->id }}">
                                        <div class="card card-body">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="d-flex">
                                                        <div class="row d-flex col-6 .col-md-4">
                                                            <span class="h3">Adres do wysyłki</span>
                                                            @foreach ($order->userOrderData as $userData)
                                                                <span>{{ $userData->name }} {{ $userData->surname }}</span>
                                                                <span>{{ $userData->full_address }}</span>
                                                                <span>{{ $userData->zip_code }} {{ $userData->city }}</span>
                                                                <span>{{ $userData->phone_number }}</span>
                                                                <span>{{ $userData->email }}</span>
                                                            @endforeach
                                                        </div>
                                                        <div class="row d-flex col-md-8">
                                                            @foreach ($order->products as $product)
                                                                <span class="d-flex align-items-center">
                                                                    <img src="{{ asset('storage/' . $product->image_path) }}" class="img-thumbnail orders-image" alt="">
                                                                    {{ $product->name }}
                                                                </span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    
        {{ $orders->links() }}
    </div>

    <div class="modal fade" id="zmianaZdjeciaModal" tabindex="-1" aria-labelledby="zmianaZdjeciaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="zmianaZdjeciaModalLabel">Zmiana Zdjęcia Profilowego</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.update', auth()->user()) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="noweZdjecie" class="form-label">Wybierz Zdjęcie Profilowe</label>
                            <input type="file" class="form-control" id="noweZdjecie" name="userProfile" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                            <button type="submit" class="btn btn-primary">Wyślij</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

      @vite([
        'resources/sass/app.scss', 
        'resources/js/app.js', 
        'resources/css/main.css',
        'resources/css/profile.css',
        ])
</body>
</html>