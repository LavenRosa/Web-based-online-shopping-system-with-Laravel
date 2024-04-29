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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>TL Cosmetics</title>
    <!-- CSS link -->
    <link rel="stylesheet" href="{{ asset('CSS/index.css')}}">
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    .top-navbar{
    width: 100%;
    height: 10vh;
    background-color: lightsalmon;

    display: flex;
    align-items: center;
    text-align: center;
    justify-content: space-between;
}
    .top-navbar .other-links {

        margin-right:50px;
        margin-top:5px;
    }
    .top-navbar .other-links button{
        background-color:lightsalmon;
        border:1px solid rgb(53, 137, 118);
        width:75px;
        height:35px;
        border-radius:10%;
    }
    .top-navbar .other-links a{
        text-decoration: none;
        color:black;
    }
    .top-navbar .other-links button:hover{
        background-color:rgb(49, 163, 110);
    }
    .top-navbar .other-links a:hover{
        color:white;;
    }
    .third .center {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 250px;
    border: 3px solid lightsalmon;
}
.third .center p{
    font-family: 'Poppins', sans-serif;
}
.third .center button{
    align-items: center;
    margin-top: 75px;
    border-radius: 50%;
    background-color: lightsalmon;
    border-color: lightsalmon;
}
    .footer{
        margin-top:100px;
        background-color:lightsalmon;
        height:300px;
    }
</style>
<body>
    <div class="top-navbar" style="background-color:lightsalmon">
        <div class="top-icons">
            <i class="fa fa-location-arrow" aria-hidden="true"></i>
            <small>No.12,55 Road, Panzuntaung Township, Yangon, Myanmar &nbsp &nbsp &nbsp</small>
            <span>Daily Open: 10:00-18:00</span>
        </div>
        <div class="other-links" >
            <button id="btn-login" style="background-color: lightsalmon; border-color:lightsalmon;"><a href="{{ route('ShowLogin') }}">Login</a></button>
            <button id="btn-signup" style="background-color: lightsalmon; border-color:lightsalmon;"><a href="{{ route('ShowRegister')}}">Sign up</a></button>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg" id="navbar" style="margin-top:20px;">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('HomePage')}}">Home</a>
              </li>
              {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: lightsalmon;">
                @foreach ( $categories as $category )
                    <li><a class="dropdown-item" href="{{ route('Category', $category->id )}}">{{ $category->name }}</a></li>
                @endforeach
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Brand
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: lightsalmon">
                    @foreach ( $brands as $brand )
                    <li><a class="dropdown-item" href="{{ route('Brand', $brand->id ) }}">{{ $brand->name }}</a></li>
                    @endforeach
                </ul>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('AboutUs') }}">About</a>
              </li>
            </ul>
            <div class="logo" style="margin-right:150px; font-family:'Poppins', sans-serif;">
                <h4 style="color:lightsalmon;"><b>Twisted Lily</b></h4>
            </div>
            <form action="{{ route('ItemSearch') }}" method="GET" class="d-flex">
                <input class="form-control me-2" name="search" type="search" style="width: 200px; height:50px; margin-top:22px;" placeholder="Search..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit" id="search-btn">Search</button>
              </form>
            <div class="icon" style="margin-left:70px; margin-right:30px; font-size:20px;">
                <a href="{{ route('ShowProfile')}}" style="color: black;">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                </a>
                <a href="{{ route('cart') }}" style="color: black;">
                    <i class="fa fa-shopping-bag" aria-hidden="true" style="margin-left:10px;"></i>
                </a>
            </div>
          </div>
        </div>
    </nav>
    <div id="app" >
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" >
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <section class="footer" style="height: 250px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6" style="text-align: center; margin-top: 60px;">
                    <h4><i>Twisted Lily</i></h4>
                    <span> We Belong To Something Beautiful.</span>
                </div>
                <div class="col-lg-6" style="display: flex; justify-content:space-evenly; margin-top: 50px;">
                    <div class="col-lg-3">
                        <ul style="list-style-type: none;">
                            <li><b>Contact Us</b></li>
                            <li>TwistedLilyCosmetics.com</li>
                            <li>0987654321, 0967891245</li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <ul style="list-style-type: none;">
                            <li><b>Social Media</b></li>
                            <li>TwistedLilyFacebookPage</li>
                        </ul>
                    </div>
                </div>
                <hr>
              <span style="text-align: center; padding-bottom:10px;">@2023Twisted Lily Cosmetics ALL RIGHT RESERVED</span>
            </div>
        </div>
    </section>
</body>
</html>
