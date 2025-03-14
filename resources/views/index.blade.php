<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Borneo Museum Sarawak</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>
<body class="d-flex flex-column h-100 light-mode" id="body">
    <main class="flex-shrink-0">
        <!-- Navigation --> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html">Borneo Museum Sarawak</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @auth
                        <li class="nav-item"><a class="nav-link" href="{{asset('index.blade.php')}}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('about.blade.php')}}">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('ticket.blade.php')}}">Ticket</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('contact.blade.php')}}">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('faq.blade.php')}}">FAQ</a></li>
                        @endauth
                            @if(Auth::check() && Auth::user()->role==1)
                            <li class="nav-item"><a class="nav-link" href="{{asset('showform.blade.php')}}">All Forms</a></li>  
                            @endif
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
                    <!-- Toggle button with icons/ dark mode -->
                    <button id="modeToggle" class="btn btn-outline-light ms-3">
                        <i class="bi bi-brightness-high" id="modeIcon"></i>
                    </button>
                </div>
            </div>
        </nav>

        <!-- Carousel Section -->
        <div id="museumCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://media.malaysianow.com/wp-content/uploads/2022/03/06224939/BCM-Gallery-11.jpg" class="d-block w-100" alt="Exhibit 1" />
                </div>
                <div class="carousel-item">
                    <img src="https://images.prestigeonline.com/wp-content/uploads/sites/5/2022/03/24115901/273209173_496456581991909_3327682375048040274_n-1024x684.jpg" class="d-block w-100" alt="Exhibit 2" />
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#museumCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#museumCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden=" true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Introduction Section -->
        <section class="py-5">
            <div class="container px-5">
                <h2 class="fw-bolder text-center mb-4">Welcome to the Borneo Museum Sarawak</h2>
                <p class="lead text-center mb-5">Discover the rich cultural heritage and diverse exhibits that showcase the history and traditions of Sarawak. Our special exhibits include artifacts from indigenous tribes, historical documents, and interactive displays that bring the stories of Borneo to life. Join us in exploring the wonders of our past and the vibrant culture that continues to thrive today.</p>
        </section>

        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright Borneo Museum Sarawak 2024</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
    </main>
</body>
</html>