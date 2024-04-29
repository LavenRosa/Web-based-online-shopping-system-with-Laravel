<nav class="navbar navbar-expand-lg" id="navbar" style="margin-top:20px;">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{ route('HomePage') }}">Home</a>
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
                        @foreach ($brands as $brand)
                        <li><a class="dropdown-item" href="{{ route('Brand', $brand->id) }}">{{ $brand->name }}</a></li>
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
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit" id="search-btn">Search</button>
                </form>
                <div class="icon" style="margin-left:70px; margin-right:30px; font-size:20px;">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <a href="{{ route('cart') }}">
                        <i class="fa fa-shopping-bag" aria-hidden="true" style="margin-left:10px;"></i>
                    </a>
                </div>
              </div>
            </div>
        </nav>
