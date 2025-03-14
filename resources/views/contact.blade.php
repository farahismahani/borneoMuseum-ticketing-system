<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Contact Us!</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico')}}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <style>
        /* Notification styles */
        .notification {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            padding: 15px;
            border-radius: 5px;
            color: white;
        }
    </style>
</head>
<body class="d-flex flex-column" id="body">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html">Borneo Museum Sarawak</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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
                    <!-- button with icons -->
                    <button id="modeToggle" class="btn btn-outline-light ms-3" aria-label="Toggle dark mode">
                        <i class="bi bi-brightness-high" id="modeIcon"></i>
                    </button>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <section class="py-5">
            <div class="container">
                <!-- Contact form -->
                <div class="bg-light rounded-3 py-3 px-3 px-md-5 mb-5">
                    <div class="text-center mb-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                        <h1 class="fw-bolder text-black">Get in touch</h1>
                        <p class="lead fw-normal text-muted mb-0">We'd love to hear from you</p>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <form id="contactForm" method="POST" action="action.php" onsubmit="return handleSubmit(event)">
                                <!-- Name input-->
                                <div class="form-floating mb-3 text-muted">
                                    <input class="form-control" id="name" type="text" placeholder="Enter your name..." required />
                                    <label for="name">Full name</label>
                                    <div class="invalid-feedback">A name is required.</div>
                                </div>
                                <!-- Email address input-->
                                <div class="form-floating mb-3 text-muted">
                                    <input class="form-control" id="email" type="email" placeholder="name@example.com" required />
                                    <label for="email">Email address</label>
                                    <div class="invalid-feedback">An email is required.</div>
                                </div>
                                <!-- Phone number input-->
                                <div class="form-floating mb-3 text-muted">
                                    <input class="form-control" id="phone " type="tel" placeholder="(123) 456-7890" required />
                                    <label for="phone">Phone number</label>
                                    <div class="invalid-feedback">A phone number is required.</div>
                                </div>
                                <!-- Message input-->
                                <div class="form-floating mb-3 text-muted">
                                    <textarea class="form-control" id="message" placeholder="Enter your message here..." style="height: 10rem" required></textarea>
                                    <label for="message">Message</label>
                                    <div class="invalid-feedback">A message is required.</div>
                                </div>
                                <!-- Submit Button-->
                                <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Notification -->
                <div id="notification" class="notification bg-success">Your message has been sent successfully!</div>
                <!-- Contact cards-->
                <div class="row gx-5 row-cols-2 row-cols-lg-4 py-5">
                    <div class="col">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-chat-dots"></i></div>
                        <div class="h5 mb-2">Chat with us</div>
                        <p class="mb-0">Chat live with one of our support specialists.</p>
                    </div>
                    <div class="col">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-people"></i></div>
                        <div class="h5">Ask the community</div>
                        <p class="mb-0">Explore our community forums and communicate with other users.</p>
                    </div>
                    <div class="col">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-question-circle"></i></div>
                        <div class="h5">Support center</div>
                        <p class="mb-0">Browse FAQ's and support articles to find solutions.</p>
                    </div>
                    <div class="col">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-telephone"></i></div>
                        <div class="h5">Call us</div>
                        <p class="mb-0">Call us during normal business hours at 082-548 215.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2023</div></div>
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
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js')}}"></script>
</body>
</html>