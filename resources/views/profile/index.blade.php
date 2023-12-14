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
    <div class="container profile-container">
        <div class="row">
          <div class="col-md-4 text-center">
            <img src="https://placekitten.com/150/150" alt="Profile" class="profile-image">
          </div>
          <div class="col-md-8">
            <h2>User Name</h2>
            <p>Email: user@example.com</p>
            <p>Location: City, Country</p>
            <p>Joined: January 1, 2023</p>
          </div>
        </div>
    
        <div class="row mt-4">
          <div class="col-md-12">
            <h4>About Me</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero nec mauris convallis, a fermentum elit vestibulum.</p>
          </div>
        </div>
    
        <div class="row mt-4">
          <div class="col-md-12">
            <h4>Additional Information</h4>
            <table class="table">
              <tr>
                <th scope="row">Age</th>
                <td>25</td>
              </tr>
              <tr>
                <th scope="row">Occupation</th>
                <td>Web Developer</td>
              </tr>
              <tr>
                <th scope="row">Interests</th>
                <td>Programming, Traveling, Reading</td>
              </tr>
            </table>
          </div>
        </div>
    </div>

      @vite([
        'resources/sass/app.scss', 
        'resources/js/app.js', 
        'resources/css/main.css'
        ])
</body>
</html>