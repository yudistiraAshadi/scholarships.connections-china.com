@extends('layouts.app')

@section('styles')
<!-- Style for Swiper.js-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.5/css/swiper.min.css">
@endsection

@section('content')
<div class="container-fluid ce-homepage px-0">
    <!-- Main Carousel Row -->
    <div class="row ce-main-carousel-row swiper-container px-0 mx-0">

        <!-- Scholarship Search Form -->
        <div class="row ce-scholarship-search-form-inside-carousel px-0 pt-3 mx-0 d-none d-md-block">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3><strong>Browse and Apply 2018 China Scholarships</strong></h3>
                    </div>
                </div>
            
                <form role="form" method="GET" action="{{ route('search.scholarship') }}">
                    <!-- Scholarship Type Radio-->
                    <div class="form-group row">
                        <label
                            for="scholarship-type"
                            class="col-md-2 col-sm-12">
                            <strong>Category</strong>
                        </label>
            
                        <div class="col-md-10 col-sm-12">
                            <label class="custom-control custom-radio">
                                <input
                                    class="custom-control-input"
                                    type="radio"
                                    id="scholarship-type"
                                    value=""
                                    name="scholarship_type"
                                    checked="checked">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">&nbsp;All</span>
                            </label>
            
                            @foreach ( $scholarshipTypes as $scholarshipTypeOption )
                            <label
                                class="custom-control custom-radio">
                                <input
                                    class="custom-control-input"
                                    type="radio"
                                    id="scholarship-type"
                                    name="scholarship_type"
                                    value="{{ $scholarshipTypeOption->id }}">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">
                                        &nbsp;{{ ucfirst($scholarshipTypeOption->type) }} Scholarship
                                    </span>
                            </label>
                            @endforeach
                        </div>
                    </div><!-- End of Scholarship Type Radio-->
            
            
                    <!-- University Name Select -->
                    <div class="form-group row">
                        <label for="university" class="col-md-2 col-sm-12"><strong>University</strong></label>
                        <div class="col-md-10 col-sm-12">
                            <select id="university" class="custom-select" name="university">
                            <option value="" selected>All</option>
                            @foreach ( $universities as $universityOption )
                            <option 
                                value="{{ $universityOption->id }}">
                                {{ ucfirst($universityOption->name) }}    
                            </option>
                            @endforeach
                        </select>
                        </div>
                    </div><!-- End of University Name Select -->
            
            
                    <!-- Degree Type Radio -->
                    <div class="form-group row">
                        <label for="degree-type" class="col-md-2 col-sm-12"><strong>Degree</strong></label>
            
                        <div class="col-md-10 col-sm-12">
                            <label class="custom-control custom-radio">
                                <input
                                    class="custom-control-input"
                                    type="radio"
                                    id="degree-type"
                                    value=""
                                    name="degree_type"
                                    checked="checked">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">&nbsp;All</span>
                            </label>
            
                            @foreach ( $degreeTypes as $degreeTypeOption )
                            <label
                                class="custom-control custom-radio">
                                <input 
                                    class="custom-control-input"
                                    type="radio" 
                                    id="degree-type"
                                    value="{{ $degreeTypeOption->id }}" 
                                    name="degree_type">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">
                                        &nbsp;{{ ucfirst($degreeTypeOption->type) }}
                                    </span>
                            </label>
                            @endforeach
                        </div>
                    </div><!-- End of Degree Type Radio -->
            
            
                    <!-- Program Language Radio -->
                    <div class="form-group row">
                        <label for="program-language" class="col-md-2 col-sm-12">
                            <strong>Language</strong>
                        </label>
                        <div class="col-md-10 col-sm-12">
                            <label class="custom-control custom-radio">
                                <input
                                    class="custom-control-input"
                                    type="radio"
                                    id="program-language"
                                    value=""
                                    name="program_language"
                                    checked="checked">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">&nbsp;All</span>
                            </label>

                            @foreach ( $programLanguages as $programLanguageOption )
                            <label
                                class="custom-control custom-radio">
                                <input
                                    class="custom-control-input"
                                    type="radio" 
                                    id="program-language"
                                    value="{{ $programLanguageOption->id }}" 
                                    name="program_language">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">
                                        &nbsp;{{ ucfirst($programLanguageOption->language) }}
                                    </span>
                            </label>
                            @endforeach
                        </div>
                    </div><!-- End of Program Language Radio -->
            
            
                    <!-- Program Input -->
                    <div class="form-group row">
                        <label for="program" class="col-md-2 col-sm-12"><strong>Program</strong></label>
                        <div class="col-md-10 col-sm-12">
                            <input type="text" id="program" class="form-control"
                                names="program">
                        </div>
                    </div><!-- End of Program Input -->
            
            
                    <!-- Submit Button -->
                    <div class="form-group row">
                        <div class="col-md-10 col-sm-12 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                <strong>Search</strong>
                            </button>
                        </div>
                    </div><!-- End of Submit Button -->
                </form>

            </div>
        </div><!-- End of Scholarship Search Form -->

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
                <a href="{{ route( 'university.show-detail', ['id' => $university->id] ) }}">
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
                </a>
            </div>
            @endforeach
        </div>

        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div><!-- End of University Carousel Row -->
    

    <!-- Scholarship Search Form -->
    <div class="row ce-scholarship-search-form-row py-2 mx-2 d-block d-md-none card">
            
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3><strong>Browse and Apply 2018 China Scholarships</strong></h3>
                </div>
            </div>
        
            <form role="form" method="GET" action="{{ route('search.scholarship') }}">
                <!-- Scholarship Type Radio-->
                <div class="form-group row">
                    <label
                        for="scholarship-type"
                        class="col-md-2 col-sm-12">
                        <strong>Category</strong>
                    </label>
        
                    <div class="col-md-10 col-sm-12">
                        <label class="custom-control custom-radio">
                            <input
                                class="custom-control-input"
                                type="radio"
                                id="scholarship-type"
                                value=""
                                name="scholarship_type"
                                checked="checked">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">&nbsp;All</span>
                        </label>
        
                        @foreach ( $scholarshipTypes as $scholarshipTypeOption )
                        <label
                            class="custom-control custom-radio">
                            <input
                                class="custom-control-input"
                                type="radio"
                                id="scholarship-type"
                                name="scholarship_type"
                                value="{{ $scholarshipTypeOption->id }}">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">
                                    &nbsp;{{ ucfirst($scholarshipTypeOption->type) }} Scholarship
                                </span>
                        </label>
                        @endforeach
                    </div>
                </div><!-- End of Scholarship Type Radio-->
        
        
                <!-- University Name Select -->
                <div class="form-group row">
                    <label for="university" class="col-md-2 col-sm-12"><strong>University</strong></label>
                    <div class="col-md-10 col-sm-12">
                        <select id="university" class="custom-select" name="university">
                        <option value="" selected>All</option>
                        @foreach ( $universities as $universityOption )
                        <option 
                            value="{{ $universityOption->id }}">
                            {{ ucfirst($universityOption->name) }}    
                        </option>
                        @endforeach
                    </select>
                    </div>
                </div><!-- End of University Name Select -->
        
        
                <!-- Degree Type Radio -->
                <div class="form-group row">
                    <label for="degree-type" class="col-md-2 col-sm-12"><strong>Degree</strong></label>
        
                    <div class="col-md-10 col-sm-12">
                        <label class="custom-control custom-radio">
                            <input
                                class="custom-control-input"
                                type="radio"
                                id="degree-type"
                                value=""
                                name="degree_type"
                                checked="checked">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">&nbsp;All</span>
                        </label>
        
                        @foreach ( $degreeTypes as $degreeTypeOption )
                        <label
                            class="custom-control custom-radio">
                            <input 
                                class="custom-control-input"
                                type="radio" 
                                id="degree-type"
                                value="{{ $degreeTypeOption->id }}" 
                                name="degree_type">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">
                                    &nbsp;{{ ucfirst($degreeTypeOption->type) }}
                                </span>
                        </label>
                        @endforeach
                    </div>
                </div><!-- End of Degree Type Radio -->
        
        
                <!-- Program Language Radio -->
                <div class="form-group row">
                    <label for="program-language" class="col-md-2 col-sm-12">
                        <strong>Language</strong>
                    </label>
                    <div class="col-md-10 col-sm-12">
                        <label class="custom-control custom-radio">
                            <input
                                class="custom-control-input"
                                type="radio"
                                id="program-language"
                                value=""
                                name="program_language"
                                checked="checked">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">&nbsp;All</span>
                        </label>

                        @foreach ( $programLanguages as $programLanguageOption )
                        <label
                            class="custom-control custom-radio">
                            <input
                                class="custom-control-input"
                                type="radio" 
                                id="program-language"
                                value="{{ $programLanguageOption->id }}" 
                                name="program_language">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">
                                    &nbsp;{{ ucfirst($programLanguageOption->language) }}
                                </span>
                        </label>
                        @endforeach
                    </div>
                </div><!-- End of Program Language Radio -->
        
        
                <!-- Program Input -->
                <div class="form-group row">
                    <label for="program" class="col-md-2 col-sm-12"><strong>Program</strong></label>
                    <div class="col-md-10 col-sm-12">
                        <input type="text" id="program" class="form-control"
                            names="program">
                    </div>
                </div><!-- End of Program Input -->
        
        
                <!-- Submit Button -->
                <div class="form-group row">
                    <div class="col-md-10 col-sm-12 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            <strong>Search</strong>
                        </button>
                    </div>
                </div><!-- End of Submit Button -->
            </form>

        </div>
    </div><!-- End of Scholarship Search Form -->
            

    <!-- Scholarship Search Result -->
    <div class="row ce-sholarship-search-results-row px-0 mx-0 my-4">
        <!-- <div class="ce-search-results-top-border w-100">
            <p><strong>All Programs</strong></p>
        </div> -->

        <scholarship-search-results
            :sortable=false
            :per-page=5
            :show-results-per-page=false
            :show-pagination-navbar=false>
        </scholarship-search-results>
        
        <div class="w-100 text-center mt-3">
            <a href="{{ route('search.scholarship') }}" class="btn btn-success"><strong>More</strong></a>
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
            <div class="col-lg empty"></div>
            <div class="col-lg col-md ce-circle">
                <img src="{{ asset('images/applying_steps/step1.png') }}" alt="Step 1">
            </div>
            <div class="col-lg empty"></div>
            <div class="col-lg col-md ce-circle">
                <img src="{{ asset('images/applying_steps/step2.png') }}" alt="Step 2">
            </div>
            <div class="col-lg empty"></div>
            <div class="col-lg col-md ce-circle">
                <img src="{{ asset('images/applying_steps/step3.png') }}" alt="Step 3">
            </div>
            <div class="col-lg empty"></div>
            <div class="col-lg col-md ce-circle">
                <img src="{{ asset('images/applying_steps/step4.png') }}" alt="Step 4">
            </div>
            <div class="col-lg empty"></div>
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
            breakpoints: {
                1100: {
                    slidesPerView: 3
                },
                800: {
                    slidesPerView: 2,
                },
                450: {
                    slidesPerView: 1,
                },
            },
        });         
    });
</script>
@endsection