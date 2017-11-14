@extends('layouts.app')

@section('styles')
<!-- Style for Swiper.js-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.6/css/swiper.min.css">
@endsection

@section('content')
<div class="container-fluid px-0">
    <!-- Main Carousel Row -->
    <div class="row ce-main-carousel-row px-0 mx-0">
        <div id="mainCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('images/main_carousel/1.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/main_carousel/5.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/main_carousel/14.jpg') }}" alt="Third slide">
                </div>
            </div>
        </div>
    </div><!-- End of Main Carousel Row -->


    <!-- University Carousel Row -->
    <div class="row ce-university-row swiper-container px-0 mx-0 my-2">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="ce-university-name-box p-1">
                    <p class="text-center"><strong>University Name</strong></p>
                </div>
                <img class="d-block w-100 img-fluid" src="{{ asset('images/university_carousel/1.jpg') }}" alt="">
            </div>
            <div class="swiper-slide">
                <div class="ce-university-name-box p-1">
                    <p class="text-center"><strong>University Name</strong></p>
                </div>
                <img class="d-block w-100 img-fluid" src="{{ asset('images/university_carousel/2.jpg') }}" alt="">
            </div>
            <div class="swiper-slide">
                <div class="ce-university-name-box p-1">
                    <p class="text-center"><strong>University Name</strong></p>
                </div>
                <img class="d-block w-100 img-fluid" src="{{ asset('images/university_carousel/3.jpg') }}" alt="">
            </div>
            <div class="swiper-slide">
                <div class="ce-university-name-box p-1">
                    <p class="text-center"><strong>University Name</strong></p>
                </div>
                <img class="d-block w-100 img-fluid" src="{{ asset('images/university_carousel/4.jpg') }}" alt="">
            </div>
            <div class="swiper-slide">
                <div class="ce-university-name-box p-1">
                    <p class="text-center"><strong>University Name</strong></p>
                </div>
                <img class="d-block w-100 img-fluid" src="{{ asset('images/university_carousel/5.jpg') }}" alt="">
            </div>
            <div class="swiper-slide">
                <div class="ce-university-name-box p-1">
                    <p class="text-center"><strong>University Name</strong></p>
                </div>
                <img class="d-block w-100 img-fluid" src="{{ asset('images/university_carousel/1.jpg') }}" alt="">
            </div>
            <div class="swiper-slide">
                <div class="ce-university-name-box p-1">
                    <p class="text-center"><strong>University Name</strong></p>
                </div>
                <img class="d-block w-100 img-fluid" src="{{ asset('images/university_carousel/2.jpg') }}" alt="">
            </div>
            <div class="swiper-slide">
                <div class="ce-university-name-box p-1">
                    <p class="text-center"><strong>University Name</strong></p>
                </div>
                <img class="d-block w-100 img-fluid" src="{{ asset('images/university_carousel/3.jpg') }}" alt="">
            </div>
            <div class="swiper-slide">
                <div class="ce-university-name-box p-1">
                    <p class="text-center"><strong>University Name</strong></p>
                </div>
                <img class="d-block w-100 img-fluid" src="{{ asset('images/university_carousel/4.jpg') }}" alt="">
            </div>
            <div class="swiper-slide">
                <div class="ce-university-name-box p-1">
                    <p class="text-center"><strong>University Name</strong></p>
                </div>
                <img class="d-block w-100 img-fluid" src="{{ asset('images/university_carousel/5.jpg') }}" alt="">
            </div>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div><!-- End of University Carousel Row -->


    <div class="row ce-scholarship-search-results-row px-0 mx-0">
        <scholarship-search-form></scholarship-search-form>
        <scholarship-search-results></scholarship-search-results>
    </div>


    <!-- Applying Steps Row -->
    <div class="row ce-applying-steps-row px-0 mx-0 py-5">
        <div class="col empty"></div>
        <div class="col ce-circle-one">
            <img src="{{ asset('images/applying_steps/step1.png') }}" alt="Step 1">
        </div>
        <div class="col empty"></div>
        <div class="col ce-circle-two">
            <img src="{{ asset('images/applying_steps/step2.png') }}" alt="Step 2">
        </div>
        <div class="col empty"></div>
        <div class="col ce-circle-three">
            <img src="{{ asset('images/applying_steps/step3.png') }}" alt="Step 3">
        </div>
        <div class="col empty"></div>
        <div class="col ce-circle-four">
            <img src="{{ asset('images/applying_steps/step4.png') }}" alt="Step 4">
        </div>
        <div class="col empty"></div>
    </div><!-- End of Applying Steps Row -->
</div>
@endsection

@section('scripts')
<!-- Swiper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.6/js/swiper.min.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        $('#mainCarousel').carousel({
            interval: 5000,
            pause: false
        });

        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 5,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                1100: {
                    slidesPerView: 4
                },
                800: {
                    slidesPerView: 3,
                },
                450: {
                    slidesPerView: 1,
                },
            },
        });                  
    });
</script>
@endsection