<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ဈေးဗန်း -Shop in One Place</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('front-asset/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column min-vh-100">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{route('index')}}">ဈေးဗန်း</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                               @php 
                                  $categories = \App\Models\Category::all();
                                @endphp
                               
                                @foreach($categories as $category)
                                <li><a class="dropdown-item" href="{{route('items.category', $category->id)}}">{{$category->name}}</a></li>
                                @endforeach


                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill" id="item-count">0</span>
                        </button>
                    </form>

                    @guest
                    @if (Route::has('login'))
                        <a class="btn mx-3" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <a class="btn btn-dark" href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    @endif

                @else
                    <li class="nav-item dropdown mx-3">
                        <a id="navbarDropdown"
                        class="nav-link dropdown-toggle"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        v-pre>

                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="navbarDropdown">

                            @if(Auth::user()->role == 'user')
                                <a class="dropdown-item" href="#">
                                    Profile
                                </a>
                            @else
                                <a class="dropdown-item" href="/admin">
                                    Admin Panel
                                </a>
                            @endif

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">

                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form"
                                action="{{ route('logout') }}"
                                method="POST"
                                class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest
                </div>
            </div>
        </nav>
  
        @yield('content')

        <!-- Footer-->
        <footer class="py-5 bg-dark mt-auto">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('front-asset/js/scripts.js')}}"></script>

        <!-- for cart -->
        <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
        <script src="{{asset('front-asset/js/cart.js')}}"></script>


    </body>
</html>
