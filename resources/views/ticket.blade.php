<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Get Your Ticket!</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico')}}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
</head>
<body class="d-flex flex-column" id="body">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html">Borneo Museum Sarawak</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
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
                    <!--button with icons / dark mode-->
                    <button id="modeToggle" class="btn btn-outline-light ms-3" aria-label="Toggle dark mode">
                        <i class="bi bi-brightness-high" id="modeIcon"></i>
                    </button>
                </div>
            </div>
        </nav>
        @if(session('info'))
            <div id="flash-message" class="alert alert-info custom-alert" style="width: 300px; margin: auto;">
                {{ session('info') }}
            </div>
                @endif
        <!-- Ticket section-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder">Museum Ticket Prices</h1>
                    <p class="lead text-center mb-5">Payment can be made in cash and online.</p>
                    <p class="lead text-center mb-2">This section is for online payment only while cash payment directly in the museum.</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <!-- Ticket card for Adult-->
                    <div class="col-lg-6 col-xl-4">
                        <div class="card mb-5 mb-xl-0">
                            <div class="card-body p-5">
                                <div class="small text-uppercase fw-bold text-muted">Adult Ticket</div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">RM10</span>
                                    <p><span class="text-muted">Sarawakian Malaysian</span></p>
                                </div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">RM20</span>
                                    <p><span class="text-muted">Non-Sarawakian Malaysian</span></p>
                                </div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">RM50</span>
                                    <p><span class="text-muted">Foreigner (International)</span></p>
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Access to all exhibitions
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary "></i>
                                        Free guided tour
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Free brochure
                                    </li>
                                </ul>
                                <div class="d-grid"><a class="btn btn-outline-primary" href="{{asset('form.blade.php')}}">Buy Ticket</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Ticket card for Teenager/Student-->
                    <div class="col-lg-6 col-xl-4">
                        <div class="card mb-5 mb-xl-0">
                            <div class="card-body p-5">
                                <div class="small text-uppercase fw-bold text-muted">Teenager/Student Ticket</div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">RM5</span>
                                    <p><span class="text-muted">Sarawakian Malaysian</span></p>
                                </div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">RM5</span>
                                    <p><span class="text-muted">Non-Sarawakian Malaysian</span></p>
                                </div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">RM25</span>
                                    <p><span class="text-muted">Foreigner (International)</span></p>
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Access to all exhibitions
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Free guided tour
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Free brochure
                                    </li>
                                </ul>
                                <div class="d-grid"><a class="btn btn-outline-primary" href="{{asset('form.blade.php')}}">Buy Ticket</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Ticket card for Family-->
                    <div class="col-lg-6 col-xl-4">
                        <div class="card">
                            <div class="card-body p-5">
                                <div class="small text-uppercase fw-bold text-muted">Family Ticket</div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">RM40</span>
                                    <p><span class="text-muted">Sarawakian Malaysian</span></p>
                                </div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">RM50</span>
                                    <p><span class="text-muted">Non-Sarawakian Malaysian</span></p>
                                </div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">RM100</span>
                                    <p><span class="text-muted">Foreigner (International)</span></p>
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Access to all exhibitions
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Free guided tour
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Free brochure
                                    </li>
                                </ul>
                                <div class="d-grid"><a class="btn btn-outline-primary" href="{{asset('form.blade.php')}}">Buy Ticket</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Horizontal Card Section -->
                <div class="row gx-5 justify-content-center mt-5">
                    <div class="col-lg-8">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">**Admission Policy**</h5>
                                <p class="card-text">>> Children under 12 years old can enter for free.</p>
                                <p class="card-text">>> Persons with disabilities can enter for free.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Wait for the DOM to fully load
            document.addEventListener('DOMContentLoaded', function() {
                // Select the flash message element
                var flashMessage = document.getElementById('flash-message');
                if (flashMessage) {
                    // Set a timeout to hide the message after 2 seconds (2000 milliseconds)
                    setTimeout(function() {
                        flashMessage.style.display = 'none'; // Hide the message
                    }, 1000);
                }
            });
        </script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>