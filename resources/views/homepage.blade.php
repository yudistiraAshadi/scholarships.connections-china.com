@extends('layouts.app')

@section('styles')
<!-- Style for Swiper.js-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.5/css/swiper.min.css">
@endsection

@section('content')
<div class="container-fluid ce-homepage px-0">
    <!-- Main Carousel Row -->
    <div class="row ce-main-carousel-row swiper-container px-0 mx-0">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img class="d-block w-100" src="{{ asset('images/main_carousel/1.jpg') }}" alt="First slide">
            </div>
            <div class="swiper-slide">
                <img class="d-block w-100" src="{{ asset('images/main_carousel/5.jpg') }}" alt="Second slide">
            </div>
            <div class="swiper-slide">
                <img class="d-block w-100" src="{{ asset('images/main_carousel/14.jpg') }}" alt="Third slide">
            </div>
        </div>
    </div><!-- End of Main Carousel Row -->


    <!-- University Carousel Row -->
    <div class="row ce-university-carousel-row swiper-container px-0 mx-0 my-3">
        <div class="swiper-wrapper">
            @foreach ($universities as $university)
            <div class="swiper-slide">
                <div class="ce-university-name-box p-1">
                    <p class="text-center"><strong>{{ $university->name }}</strong></p>
                </div>
                
                <img
                    class="d-block w-100 img-fluid"
                    src=
                    @php
                        if (isset($university->photos)) {

                            if (strpos($university->photos, '|') === true) {
                                $universityPhotos = explode("|", $university->photos);
                                echo $universityPhotos[array_rand($universityPhotos, 1)];
                            } else {
                                echo $university->photos;
                            }
                        } elseif (! isset($university->logo)) {
                            echo $university->logo;
                        } else {
                            echo '';
                        }
                    @endphp
                    alt="{{ $university->name }}'s photo'">
            </div>
            @endforeach
        </div>

        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div><!-- End of University Carousel Row -->


    <!-- Scholarship Search Form Row -->
    <div class="row ce-scholarship-search-form-row px-0 mx-0">
        <scholarship-search-form></scholarship-search-form>
    </div><!-- End of Scholarship Search Form Row -->

    <!-- Scholarship Search Result -->
    <div class="row ce-sholarship-search-results-row px-0 mx-0 my-4">
        <div class="ce-search-results-top-border w-100">
            <p><strong>All Programs</strong></p>
        </div>

        <scholarship-search-results :sortable=false :perPage=5></scholarship-search-results>
        
        <div class="w-100 text-center">
            <a href="#" class="btn btn-success"><strong>More</strong></a>
        </div>
    </div><!-- End of Scholarship Search Result -->


    <div class="ce-comment-carousel-and-applying-steps-wrapper">
        <!-- Comment Carousel Row -->
        <div class="row ce-comment-carousel-row p-4 mx-0">
            <div class="d-block ce-swiper-container-bg-color w-100 p-3">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card w-100 h-100">
                                <div class="ce-card-image text-center mt-3 mb-4">
                                    <img src="{{ asset('images/university_carousel/4.jpg') }}" alt="" class="rounded-circle">
                                </div>
                                <div class="card-body p-0 mx-2">
                                    <p class="card-text text-center">asdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasd</p>
                                    <p class="text-center"><strong>asd</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card w-100 h-100">
                                <div class="ce-card-image text-center mt-3 mb-4">
                                    <img src="{{ asset('images/university_carousel/4.jpg') }}" alt="" class="rounded-circle">
                                </div>
                                <div class="card-body p-0 mx-2">
                                    <p class="card-text text-center">asdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasd</p>
                                    <p class="text-center"><strong>asd</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card w-100 h-100">
                                <div class="ce-card-image text-center mt-3 mb-4">
                                    <img src="{{ asset('images/university_carousel/4.jpg') }}" alt="" class="rounded-circle">
                                </div>
                                <div class="card-body p-0 mx-2">
                                    <p class="card-text text-center">asdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasd</p>
                                    <p class="text-center"><strong>asd</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card w-100 h-100">
                                <div class="ce-card-image text-center mt-3 mb-4">
                                    <img src="{{ asset('images/university_carousel/4.jpg') }}" alt="" class="rounded-circle">
                                </div>
                                <div class="card-body p-0 mx-2">
                                    <p class="card-text text-center">asdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasd</p>
                                    <p class="text-center"><strong>asd</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card w-100 h-100">
                                <div class="ce-card-image text-center mt-3 mb-4">
                                    <img src="{{ asset('images/university_carousel/4.jpg') }}" alt="" class="rounded-circle">
                                </div>
                                <div class="card-body p-0 mx-2">
                                    <p class="card-text text-center">asdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasd</p>
                                    <p class="text-center"><strong>asd</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card w-100 h-100">
                                <div class="ce-card-image text-center mt-3 mb-4">
                                    <img src="{{ asset('images/university_carousel/4.jpg') }}" alt="" class="rounded-circle">
                                </div>
                                <div class="card-body p-0 mx-2">
                                    <p class="card-text text-center">asdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasd</p>
                                    <p class="text-center"><strong>asd</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="swiper-button-next swiper-button-black"></div>
                    <div class="swiper-button-prev swiper-button-black"></div>
                </div>
            </div>
        </div><!-- End of Comment Carousel Row -->
    
    
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
</div>
@endsection

@section('scripts')
<!-- Swiper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.5/js/swiper.min.js"></script>

<script type="text/javascript">
    jQuery( document ).ready( function () {
        var mainSwiper = new Swiper('.ce-main-carousel-row', {
            autoplay: {
                delay: 10000,
            },
            allowTouchMove: false,
        });

        var universitySwiper = new Swiper('.ce-university-carousel-row', {
            slidesPerView: 5,
            navigation: {
                nextEl: '.ce-university-carousel-row .swiper-button-next',
                prevEl: '.ce-university-carousel-row .swiper-button-prev',
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

        var commentSwiper = new Swiper('.ce-comment-carousel-row .swiper-container', {
            slidesPerView: 3,
            spaceBetween: 15,
            navigation: {
                nextEl: '.ce-swiper-container-bg-color .swiper-button-next',
                prevEl: '.ce-swiper-container-bg-color .swiper-button-prev',
            },
        });         
    });
</script>
@endsection