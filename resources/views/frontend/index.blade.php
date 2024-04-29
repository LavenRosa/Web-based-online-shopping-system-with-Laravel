<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <script>
        // Simulated function to check if the user is logged in
        function checkLoggedIn() {
            // Simulating that the user is logged in
            return true; // Change this to false to test the error message
        }

        // Add event listeners to the login and signup buttons after the DOM is loaded
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('btn-login').addEventListener('click', function(event) {
                if (checkLoggedIn()) {
                    event.preventDefault(); // Prevent the default action (redirecting to the login page)
                    alert('You are already logged in.'); // Display an error message
                }
            });

            document.getElementById('btn-signup').addEventListener('click', function(event) {
                if (checkLoggedIn()) {
                    event.preventDefault(); // Prevent the default action (redirecting to the signup page)
                    alert('You are already logged in.'); // Display an error message
                }
            });
        });
    </script>
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

    <div class="top-navbar" style="background-color:lightsalmon">
        <div class="top-icons">
            <i class="fa fa-location-arrow" aria-hidden="true"></i>
            <small>No.12,55 Road, Panzuntaung Township, Yangon, Myanmar &nbsp &nbsp &nbsp</small>
            <span>Daily Open: 10:00-18:00</span>
        </div>
        {{-- <div class="other-links" style="background-color: lightsalmon; border-color:lightsalmon;">
            <button id="btn-login" style="background-color: lightsalmon; border-color:lightsalmon;"><a href="{{ route('ShowLogin') }}">Login</a></button>
            <button id="btn-signup" style="background-color: lightsalmon; border-color:lightsalmon;"><a href="{{ route('ShowRegister')}}">Sign up</a></button>
        </div> --}}
        <div class="other-links" style="background-color: lightsalmon; border-color:lightsalmon;">
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
                        <a class="nav-link" href="{{ route('HomePage')}}">Home</a>
                    </li>
                  <li class="nav-item dropdown">
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
                  </li>
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
        {{-- @include('frontend.nav') --}}
        @yield('content')
        <section class="main-top" style="margin-top:50px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4" style="margin-top:50px;">
                        <span style="font-family:'Poppins', sans-serif; margin-left:50px; text-align:center;">Have Enjoy your Shopping with Us!</span>
                        <a href="">
                            <button type="submit" class="btn" style="border:raduis:"></button>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <img src="{{ asset('images/top.jfif' )}}" alt="" width="300px" height="350px" style="margin-left:30px;">
                    </div>
                    <div class="col-lg-4" style="font-family:'Poppins', sans-serif; margin-top: 250px;">
                        <span>Make You More Beautiful From Here!</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="second">
            <div class="container-fluid" style="margin-top:50px;">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row2">
                            <div class="col5">
                                    <img src="{{ asset('images/col.jfif')}}" alt="" style="width: 300px; height: 350px;">
                                </div>
                                <div class="cols" >
                                    <div class="col1">
                                        <div class="incol d-flex">
                                            <div class="col2">
                                                <img src="{{ asset('images/col1.jfif')}}" alt="" style="width: 180px; height: 170px; margin-left:20px; margin-top:20px;">
                                            </div>
                                            <div class="col3">
                                                <img src="{{ asset('images/col2.jfif')}}" alt="" style="width: 180px; height: 170px; margin-top:20px;">
                                            </div>
                                        </div>
                                        <div style="display: flex; justify-content: space-evenly;">
                                            <div class="col4">
                                                <img src="{{ asset('images/col3.jfif')}}" alt="" style="width: 180px; height: 170px; margin-left:20px;">
                                            </div>
                                            <div class="col6">
                                                <img src="{{ asset('images/col4.jfif')}}" alt="" style="width: 180px; height: 170px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="category">
            <div class="container-fluid" style="margin-top:100px;">
                <div class="row1" style="margin-top:50px;">
                    <h6 style="font-family:'Poppins', sans-serif; text-align:center">CATEGORY</h6>
                </div>
                <div class="row" style="margin-top:50px; margin-left:40px;">
                    <div class="col-lg-3">
                        <img src="{{ asset('images/face1.jfif')}}" alt=""><br>
                        <span>FACE</span>
                    </div>
                    <div class="col-lg-3">
                        <img src="{{ asset('images/eye.jfif')}}" alt=""><br>
                        <span style="margin-left:60px;">EYE</span>
                    </div>
                    <div class="col-lg-3">
                        <img src="{{ asset('images/lip.jfif')}}" alt=""><br>
                        <span style="margin-left:60px;">LIP</span>
                    </div>
                    <div class="col-lg-3">
                        <img src="{{ asset('images/makeup.jfif')}}" alt=""><br>
                        <span>MAKEUP TOOLS</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="third">
            <div class="container" style="margin-top:100px;">
                <div class="center">
                    <p>Have a nice Shopping.</p>
                    <div class="btn">
                        <a href=""><button type="submit" class="btn"></button></a>
                    </div>
                </div>
            </div>
        </section>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('JS/cart.js') }}"></script>

</body>
</html>
