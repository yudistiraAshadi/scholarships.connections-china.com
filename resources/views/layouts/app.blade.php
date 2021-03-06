@extends('layouts.base')

@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light px-0 mb-2">
    <div class="container-fluid ce-container-inside-navbar">
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
                <a class="{{ Request::is('/') ? 'active' : '' }} nav-item nav-link" href="{{ url('/') }}">
                    Home <span class="sr-only">(current)</span>
                </a>
                <a class="{{ ( Request::is('search/university') || Request::is('university/*') ) ? 'active' : '' }} nav-item nav-link" href="#">Universities</a>
                <a class="{{ ( Request::is('search/scholarship') || Request::is('scholarship/*') ) ? 'active' : '' }} nav-item nav-link" href="{{ route('search.scholarship') }}">Scholarships</a>
                <a class="disabled nav-item nav-link" href="#">FAQs</a>
                <a class="disabled nav-item nav-link" href="#">About Us</a>
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
                            <p class="ce-counter text-center p-0">50121</p>
                            <p class="text-center m-0 p-0">APPLICANTS</p>
                        </div>
                    </div>
                </div>
            </div><!-- End of Menu for Laptop - Top Row -->
        
            <!-- Menu for Laptop - Bottom Row -->
            <div class="w-100 navbar-nav d-none d-lg-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col p-0 mx-1">
                            <a class="{{ Request::is('/') ? 'active' : '' }} nav-item nav-link text-center btn btn-block ce-btn-navbar" role="button" aria-pressed="true" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </div>
                        <div class="col p-0 mx-1">
                            <a class="{{ ( Request::is('search/university') || Request::is('university/*') ) ? 'active' : '' }} nav-item nav-link text-center btn ce-btn-navbar btn-block" role="button" aria-pressed="true" href="#">Universities</a>
                        </div>
                        <div class="col p-0 mx-1">
                            <a class="{{ ( Request::is('search/scholarship') || Request::is('scholarship/*') ) ? 'active' : '' }} nav-item nav-link text-center btn ce-btn-navbar btn-block" role="button" aria-pressed="true" href="{{ route('search.scholarship') }}">Scholarships</a>
                        </div>
                        <div class="col p-0 mx-1">
                            <a class="nav-item nav-link text-center btn ce-btn-navbar btn-block disabled" role="button" aria-pressed="true" href="#">FAQs</a>
                        </div>
                        <div class="col p-0 mx-1">
                            <a class="nav-item nav-link text-center btn ce-btn-navbar btn-block disabled" role="button" aria-pressed="true" href="#">About Us</a>
                        </div>
                    </div>
                </div>
            </div><!-- End of Menu for Laptop - Bottom Row -->

        </div><!-- End of Navbar Menu -->
        
    </div>
</nav>
@endsection


@section('footer')
<footer>
    <div class="container-fluid">
        <div class="row px-3 pt-5">
            <!-- Footer Usefull Links -->
            <div class="ce-footer-column ce-footer-usefull-links col-lg-3 col-md-6 col-xs-12">
                <h3 class="ce-footer-title">Usefull Links</h3>
                <ul>
                    <li>
                        <span class="fa-stack">
                            <i class="fa fa-circle fa-stack-1x" aria-hidden="true"></i>
                            <i class="fa fa-check-circle fa-stack-1x" aria-hidden="true"></i>
                        </span>
                        <a href="#">Frequently Asked Questions</a>
                    </li>
                    <li>
                        <span class="fa-stack">
                            <i class="fa fa-circle fa-stack-1x" aria-hidden="true"></i>
                            <i class="fa fa-check-circle fa-stack-1x" aria-hidden="true"></i>
                        </span>
                        <a href="#">Application Procedure</a>
                    </li>
                    <li>
                        <span class="fa-stack">
                            <i class="fa fa-circle fa-stack-1x" aria-hidden="true"></i>
                            <i class="fa fa-check-circle fa-stack-1x" aria-hidden="true"></i>
                        </span>
                        <a href="#">MBBS in China</a>
                    </li>
                    <li>
                        <span class="fa-stack">
                            <i class="fa fa-circle fa-stack-1x" aria-hidden="true"></i>
                            <i class="fa fa-check-circle fa-stack-1x" aria-hidden="true"></i>
                        </span>
                        <a href="#">Air Ticket Service</a>
                    </li>
                    <li>
                        <span class="fa-stack">
                            <i class="fa fa-circle fa-stack-1x" aria-hidden="true"></i>
                            <i class="fa fa-check-circle fa-stack-1x" aria-hidden="true"></i>
                        </span>
                        <a href="#">Admission Requirements</a>
                    </li>
                    <li>
                        <span class="fa-stack">
                            <i class="fa fa-circle fa-stack-1x" aria-hidden="true"></i>
                            <i class="fa fa-check-circle fa-stack-1x" aria-hidden="true"></i>
                        </span>
                        <a href="#">Expenses in China</a>
                    </li>
                    <li>
                        <span class="fa-stack">
                            <i class="fa fa-circle fa-stack-1x" aria-hidden="true"></i>
                            <i class="fa fa-check-circle fa-stack-1x" aria-hidden="true"></i>
                        </span>
                        <a href="#">Part-time Jobs in China</a>
                    </li>
                    <li>
                        <span class="fa-stack">
                            <i class="fa fa-circle fa-stack-1x" aria-hidden="true"></i>
                            <i class="fa fa-check-circle fa-stack-1x" aria-hidden="true"></i>
                        </span>
                        <a href="#">Pre-Departure Preparation</a>
                    </li>
                    <li>
                        <span class="fa-stack">
                            <i class="fa fa-circle fa-stack-1x" aria-hidden="true"></i>
                            <i class="fa fa-check-circle fa-stack-1x" aria-hidden="true"></i>
                        </span>
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
@endsection