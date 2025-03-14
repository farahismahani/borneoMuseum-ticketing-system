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

    <!-- Heading -->
    <h1 class="display-4 fw-bold text-center"><br><strong>Ticket Purchased Record</strong><br><br></h1>

        <!-- Table -->
        <div class="form-group mb-3" style="padding: 0px 50px;">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr style="text-align: center;">
                            <th style="width: 150px;vertical-align: middle;">ID</th>
                            <th style="width: 150px;vertical-align: middle;">Name</th>
                            <th style="width: 150px;vertical-align: middle;">Email</th>
                            <th style="width: 150px;vertical-align: middle;">Time</th>
                            <th style="width: 150px;vertical-align: middle;">Date</th>
                            <td style='width: 150px;vertical-align: middle;'>Ticket Type</td>
                            <td style='width: 150px;vertical-align: middle;'>Nationality</td>
                            <td style='width: 150px;vertical-align: middle;'>Quantity</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alldata as $data)

                        <tr style='text-align: center;'>
                            <td style='width: 150px;vertical-align: middle;'>{{$data->id}}</td>
                            <td style='width: 150px;vertical-align: middle;'>{{$data->name}}</td>
                            <td style='width: 150px;vertical-align: middle;'>{{$data->email}}</td>
                            <td style='width: 150px;vertical-align: middle;'>{{$data->time}}</td>
                            <td style='width: 150px;vertical-align: middle;'>{{$data->date}}</td>
                            <td style='width: 150px;vertical-align: middle;'>{{$data->t_type}}</td>
                            <td style='width: 150px;vertical-align: middle;'>{{$data->nationality}}</td>
                            <td style='width: 150px;vertical-align: middle;'>{{$data->quantity}}</td>
                            <td>

                            <form action="{{route('delete',$data->id)}}" method="POST">

                            <a href="{{route('readform.show',$data->id)}}" class='btn btn-success'>
                            Read</a>

                            <a href="{{route('updateform.show',$data->id)}}" class='btn btn-primary'>
                            Update</a>

                            @csrf
                            @method('DELETE')
                            <button class='btn btn-danger' type='submit' name='delete'>
                            Delete</button>
                            </form>
                            </td>
                        </tr>

                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    {{-- Pagination bar --}}
        <div class="d-flex justify-content-center">
    {!! $alldata->links() !!}
        </div>
    </body>
</html>
