<!DOCTYPE html>
<html lang="en">
<head>
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
<body>
    <div class="top-navbar" style="background-color:lightsalmon">
        <div class="top-icons">
            <i class="fa fa-location-arrow" aria-hidden="true"></i>
            <small>No.12,55 Road, Panzuntaung Township, Yangon, Myanmar &nbsp &nbsp &nbsp</small>
            <span>Daily Open: 10:00-18:00</span>
        </div>
        <div class="other-links">
            <button id="btn-login"><a href="login.php">Login</a></button>
            <button id="btn-signup"><a href="{{ route('ShowUserRegister' )}}">Sign up</a></button>
        </div>
    </div>

        <nav class="navbar navbar-expand-lg" id="navbar" style="margin-top:20px;">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: lightsalmon;">
                      <li><a class="dropdown-item" href="#">Face</a></li>
                      <li><a class="dropdown-item" href="#">Eye</a></li>
                      <li><a class="dropdown-item" href="#">Lip</a></li>
                      <li><a class="dropdown-item" href="#">Makeup Tools</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Brand
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: lightsalmon">
                      <li><a class="dropdown-item" href="#">Face</a></li>
                      <li><a class="dropdown-item" href="#">Eye</a></li>
                      <li><a class="dropdown-item" href="#">Lip</a></li>
                      <li><a class="dropdown-item" href="#">Makeup Tools</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin.php">Admin</a>
                  </li>
                </ul>
                <div class="logo" style="margin-right:150px; font-family:'Poppins', sans-serif;">
                    <h4 style="color:lightsalmon;"><b>Twisted Lily</b></h4>
                </div>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit" id="search-btn">Search</button>
                </form>
                <div class="icon" style="margin-left:70px; margin-right:30px; font-size:20px;">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <i class="fa fa-shopping-bag" aria-hidden="true" style="margin-left:10px;"></i>
                </div>
              </div>
            </div>
        </nav>

        @yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
