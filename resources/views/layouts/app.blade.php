<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Code Bunker | Home</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/home.css')}}" />
    <link rel="stylesheet" href="{{asset('css/category.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container border-bottom border-warning border-1">
        <a href="{{route('index')}}"><img class="navbar-brand" src="{{asset('imgs/logoH.svg')}}" width="100" alt="logo" /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
        <ul class="navbar-nav ">
                        <!-- Authentication Links -->
             
            </li>
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('home')}}">
                Exams
              </a>
            </li>
           
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item home-btn-login">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item home-btn-login">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @if (Auth::user()->userHasRole('Admin'))
                                <li class="nav-item home-btn-login">
                                    <a class="nav-link" href="{{ route('index_admin') }}">Admin Dashboard</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{route('results.index')}}">
                                     Profile 
                                  </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
          <!-- <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="contact.html">
                Contact Us
              </a>
            </li>
            <li class="nav-item home-btn-login">
              <a class="nav-link" href="{{ route('login') }}" >Log in</a>
            </li>
            <li class="nav-item home-btn-login">
              <a class="nav-link" href="{{ route('register') }}" >sign Up</a>
            </li>
          </ul> -->
        </div>
      </div>
    </nav>
    @yield('content')
    <footer>
      <div class="container">
        <div class="logo">
          <img src="imgs/logoH.png" width="70px" alt="" />
        </div>
        <div class="social-icon">
          <a
            href="mailto:hazem.alrfati@gmail.com"
            rel="noopener"
            target="_blank"
            class="icon"
          >
            <i class="fas fa-envelope"></i>
          </a>
          <a href="https://Youtube.com" target="_blank" class="icon">
            <i class="fab fa-youtube"></i>
          </a>
          <a href="https://www.apple.com/store" target="_blank" class="icon">
            <i class="fab fa-app-store"></i>
          </a>
        </div>
      </div>
    </footer>
    <script src="js/bootstrap.js"></script>
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
