<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
            <div class="container-fluid">
                <!-- Company Logo + Name -->
                <a href="{{ url('/') }}" class="navbar-brand">{{ config('app.name', 'Laravel') }}</a>

                <!-- Hamburger Menu -->
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="flex-column collapse navbar-collapse" id="navbarCollapse">
                    <div class="w-100 navbar-nav d-none d-lg-block">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <a class="nav-item nav-link text-center" href="#">Home</a>
                                </div>
                                <div class="col">
                                    <a class="nav-item nav-link text-center" href="#">Universities</a>
                                </div>
                                <div class="col">
                                    <a class="nav-item nav-link text-center" href="#">Scholarships</a>
                                </div>
                                <div class="col">
                                    <a class="nav-item nav-link text-center" href="#">FAQs</a>
                                </div>
                                <div class="col">
                                    <a class="nav-item nav-link text-center" href="#">About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="w-100 navbar-nav d-none d-lg-block">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <a class="nav-item nav-link active text-center" href="#">Home <span class="sr-only">(current)</span></a>
                                </div>
                                <div class="col">
                                    <a class="nav-item nav-link text-center" href="#">Universities</a>
                                </div>
                                <div class="col">
                                    <a class="nav-item nav-link text-center" href="#">Scholarships</a>
                                </div>
                                <div class="col">
                                    <a class="nav-item nav-link text-center" href="#">FAQs</a>
                                </div>
                                <div class="col">
                                    <a class="nav-item nav-link text-center" href="#">About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="navbar-nav d-sm-block d-lg-none">
                        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="#">Universities</a>
                        <a class="nav-item nav-link" href="#">Scholarships</a>
                        <a class="nav-item nav-link" href="#">FAQs</a>
                        <a class="nav-item nav-link" href="#">About Us</a>
                    </div>
                    
                </div>
                
            </div>
        </nav>

        <!-- Body -->
        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
