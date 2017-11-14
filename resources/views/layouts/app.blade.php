<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @yield('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">

        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <!-- Company Logo + Name -->
                <a href="{{ url('/') }}" class="navbar-brand p-0 m-0">
                    <img class="ce-csscholarship-logo" src="{{ asset('images/cs_scholarship_logo.jpg') }}" alt="Connections Scholarship Logo">
                </a>


                <!-- Hamburger Menu -->
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <!-- Navbar Menu -->
                <div class="flex-column collapse navbar-collapse" id="navbarCollapse">
                    <!-- Menu for Mobile -->
                    <div class="navbar-nav d-sm-block d-lg-none">
                        <a class="nav-item nav-link active" href="{{ url('/') }}">
                            Home <span class="sr-only">(current)</span>
                        </a>
                        <a class="nav-item nav-link" href="#">Universities</a>
                        <a class="nav-item nav-link" href="#">Scholarships</a>
                        <a class="nav-item nav-link" href="#">FAQs</a>
                        <a class="nav-item nav-link" href="#">About Us</a>
                    </div>

                    <!-- Menu for Laptop - Top Row -->
                    <div class="w-100 ce-nav-top-row d-none d-lg-block">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-5 p-0 mx-1 my-auto">
                                    <p class="text-center p-0 m-0">We Are Here to Help!</p>
                                </div>
                                <div class="col-lg-4 p-0 mx-1 mb-1">
                                    <div class="text-center">
                                        <img class="ce-social-icon" src="{{ asset('images/wechat.jpg') }}" alt="WeChat">
                                        <img class="ce-social-icon" src="{{ asset('images/twitter.jpg') }}" alt="Twitter">
                                        <img class="ce-social-icon" src="{{ asset('images/facebook.jpg') }}" alt="Facebook">
                                        <img class="ce-social-icon" src="{{ asset('images/linkedin.jpg') }}" alt="linkedIn">
                                        <img class="ce-social-icon" src="{{ asset('images/whatsapp.jpg') }}" alt="WhatsApp">
                                    </div>
                                </div>
                                <div class="col-lg p-0 mx-1 my-auto ce-applicant-counter">
                                    <div class="ce-counter text-center p-0">TODO: Counter</div>
                                    <div class="text-center m-0 p-0">APPLICANTS</div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End of Menu for Laptop - Top Row -->
                
                    <!-- Menu for Laptop - Bottom Row -->
                    <div class="w-100 navbar-nav d-none d-lg-block">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col p-0 mx-1">
                                    <a class="nav-item nav-link active text-center btn btn-block ce-btn-navbar" role="button" aria-pressed="true" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                                </div>
                                <div class="col p-0 mx-1">
                                    <a class="nav-item nav-link text-center btn ce-btn-navbar btn-block" role="button" aria-pressed="true" href="#">Universities</a>
                                </div>
                                <div class="col p-0 mx-1">
                                    <a class="nav-item nav-link text-center btn ce-btn-navbar btn-block" role="button" aria-pressed="true" href="#">Scholarships</a>
                                </div>
                                <div class="col p-0 mx-1">
                                    <a class="nav-item nav-link text-center btn ce-btn-navbar btn-block" role="button" aria-pressed="true" href="#">FAQs</a>
                                </div>
                                <div class="col p-0 mx-1">
                                    <a class="nav-item nav-link text-center btn ce-btn-navbar btn-block" role="button" aria-pressed="true" href="#">About Us</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End of Menu for Laptop - Bottom Row -->

                </div><!-- End of Navbar Menu -->
                
            </div>
        </nav>

        <!-- Body -->
        @yield('content')

        <!-- Footer -->
        <footer>
            <div class="container-fluid">
                <div class="row px-3 pt-5">
                    <!-- Footer Usefull Links -->
                    <div class="ce-footer-column ce-footer-usefull-links col-lg-3 col-md-6 col-xs-12">
                        <h3 class="ce-footer-title">Usefull Links</h3>
                        <ul>
                            <li>
                                <i class="ce-check-circle fa fa-check-circle" aria-hidden="true"></i>
                                <a href="#">Frequently Asked Questions</a>
                            </li>
                            <li>
                                <i class="ce-check-circle fa fa-check-circle" aria-hidden="true"></i>
                                <a href="#">Application Procedure</a>
                            </li>
                            <li>
                                <i class="ce-check-circle fa fa-check-circle" aria-hidden="true"></i>
                                <a href="#">MBBS in China</a>
                            </li>
                            <li>
                                <i class="ce-check-circle fa fa-check-circle" aria-hidden="true"></i>
                                <a href="#">Air Ticket Service</a>
                            </li>
                            <li>
                                <i class="ce-check-circle fa fa-check-circle" aria-hidden="true"></i>
                                <a href="#">Admission Requirements</a>
                            </li>
                            <li>
                                <i class="ce-check-circle fa fa-check-circle" aria-hidden="true"></i>
                                <a href="#">Expenses in China</a>
                            </li>
                            <li>
                                <i class="ce-check-circle fa fa-check-circle" aria-hidden="true"></i>
                                <a href="#">Part-time Jobs in China</a>
                            </li>
                            <li>
                                <i class="ce-check-circle fa fa-check-circle" aria-hidden="true"></i>
                                <a href="#">Pre-Departure Preparation</a>
                            </li>
                            <li>
                                <i class="ce-check-circle fa fa-check-circle" aria-hidden="true"></i>
                                <a href="#">Apply for Student Visa</a>
                            </li>
                        </ul>
                    </div><!-- End of Footer Usefull Links -->


                    <!-- Footer Contact Information -->
                    <div class="ce-footer-column ce-footer-contact-information col-lg-3 col-md-6 col-xs-12">
                        <h3 class="ce-footer-title">Contact Information</h3>
                        <dl>
                            <dt>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                Address
                            </dt>
                            <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis odio sed mi efficitur rutrum. Praesent cursus sapien nulla, nec finibus tellus sollicitudin ut.</dd>
                            <dt>
                                <i class="fa fa-phone"></i>
                                Phone
                            </dt>
                            <dd>
                                <ul>
                                    <li>Phone: 123123123213</li>
                                    <li>Mobile: 123123123</li>
                                </ul>
                            </dd>
                            <dt>
                                <i class="fa fa-envelope"></i>
                                Email
                            </dt>
                            <dd>connections@vip.163.com</dd>
                        </dl>
                    </div><!-- End of Footer Contact Information -->

                    <div class="ce-footer-column col-lg-3 col-md-6 col-xs-12">
                        <h3 class="ce-footer-title">Facebook Page</h3>
                    </div>

                    <div class="ce-footer-column col-lg-3 col-md-6 col-xs-12">
                        <h3 class="ce-footer-title">Scholarship Offer</h3>
                    </div>
                </div><!-- End of Row -->
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

</body>
</html>
