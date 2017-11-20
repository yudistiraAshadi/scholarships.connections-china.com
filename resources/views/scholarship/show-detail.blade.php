@extends('layouts.app')

@section('styles')
<!-- Smartphoto JS image viewer library -->
<link rel="stylesheet" href="https://unpkg.com/smartphoto@1.0.1/css/smartphoto.min.css">
@endsection

@section('content')
<div class="container-fluid ce-scholarship-show-detail pt-3">
    <div class="row">

        <!-- University's information -->
        <div class="col-md-4 ce-university-information">
            <!-- University basic information -->
            <div class="row">
                <div class="col-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <!-- University's logo -->
                            <img
                                src="{{ $scholarship->university->logo }}"
                                alt="{{ $scholarship->university->name }}'s logo'"
                                class="ce-university-logo rounded-circle img-thumbnail mb-2">
        
                            <!-- Name -->
                            <h4 class="card-title"><strong>{{ $scholarship->university->name }}</strong></h4>
        
                            <div class="dotdotdot-truncate">
                                <p class="card-text text-left">{{ $scholarship->university->introduction }}</p>
                            </div>
        
                            <p class="text-right">
                                <a href="#" class="card-link">See more</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div><!-- End of University basic information -->

            <!-- University other information -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-title"><strong>About</strong></p>
                            <!-- Address -->
                            <ul class="fa-ul">
                                <li>
                                    <i class="fa-li fa-lg fa fa-map-marker text-muted"></i>
                                    <p class="text-capitalize text-left">
                                        {{ $scholarship->university->country }},
                                        &nbsp;{{ $scholarship->university->governing_district }},
                                        &nbsp;{{ $scholarship->university->major_municipality }}
                                        @if ( isset( $scholarship->university->minor_municipality ) )
                                            ,&nbsp;{{ $scholarship->university->minor_municipality }}
                                        @endif
                                        @if ( isset( $scholarship->university->detailed_address ) )
                                            ,&nbsp;{{ $scholarship->university->detailed_address }}
                                        @endif
                                    </p>
                                </li>
                            </ul>     

                        </div>
                    </div>       
                </div>
            </div><!-- End of University other information -->

             <!-- University photos -->
             <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
    
                                <p class="card-title"><strong>Photos</strong></p>
                                <div class="row">
                                @foreach ( explode( '|', $scholarship->university->photos ) as $photo )
                                    <div class="col-4">
                                        <a
                                            href="{{ $photo }}"
                                            class="js-smartPhoto"/>
                                            <img
                                                src="{{ $photo }}"
                                                alt="{{ $scholarship->university->name }}'s photo'"
                                                class="img-fluid img-thumbnail rounded mb-3">
                                        </a>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>       
                    </div>
                </div><!-- End of University photos -->

        </div><!-- End of University's information -->


        <!-- Scholarship's information -->
        <div class="col-md-8 ce-scholarship-information">
            <div class="card">
                <div class="card-body">

                    <!-- Degree -->
                    <div class="row ce-information-item">
                        <div class="col-4">
                            <p class="ce-information-title text-right"><strong>Degree</strong></p>
                        </div>
                        <div class="col-8">
                            @if ( strtolower($scholarship->degreeType->type) !== 'non-degree' )
                                <p><span class="text-capitalize">{{ $scholarship->degreeType->type }}</span> degree</p>
                            @else
                                <p class="text-capitalize">{{ $scholarship->degreeType->type }}</p>
                            @endif
                        </div>
                    </div><!-- End of Degree -->

                    <!-- Program -->
                    <div class="row ce-information-item">
                        <div class="col-4">
                            <p class="ce-information-title text-right"><strong>Program</strong></p>
                        </div>
                        <div class="col-8">
                            <p class="text-capitalize">{{ $scholarship->program }}</p>
                        </div>
                    </div><!-- End of Program -->

                    <!-- Language -->
                    <div class="row ce-information-item">
                        <div class="col-4">
                            <p class="ce-information-title text-right"><strong>Study Language</strong></p>
                        </div>
                        <div class="col-8">
                            <p class="text-capitalize">{{ $scholarship->programLanguage->language }}</p>
                        </div>
                    </div><!-- End of Language -->

                    <!-- Schoalrship Type -->
                    <div class="row ce-information-item">
                        <div class="col-4">
                            <p class="ce-information-title text-right"><strong>Scholarship Type</strong></p>
                        </div>
                        <div class="col-8">
                            <p class="text-capitalize-first-letter">{{ $scholarship->scholarshipType->type }} scholarship</p>
                        </div>
                    </div><!-- End of Scholarship Type -->

                    <!-- Benefits -->
                    <div class="row ce-information-item ce-information-list">
                        <div class="col-4">
                            <p class="ce-information-title text-right"><strong>Benefits</strong></p>
                        </div>
                        <div class="col-8">
                            <ul >
                                @foreach ( explode('|', $scholarship->benefits) as $benefit )
                                    <li class="text-capitalize-first-letter">{{ $benefit }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- End of Benefits -->

                    <!-- Requirements -->
                    <div class="row ce-information-item ce-information-list">
                        <div class="col-4">
                            <p class="ce-information-title text-right"><strong>Requirements</strong></p>
                        </div>
                        <div class="col-8">
                            <ul >
                                @foreach ( explode('|', $scholarship->requirements) as $requirement )
                                    <li class="text-capitalize-first-letter">{{ $requirement }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- End of Requirements -->

                    <!-- Other information -->
                    @if ( isset($scholarship->other_information) )
                        <div class="row ce-information-item">
                            <div class="col-4">
                                <p class="ce-information-title text-right"><strong>Other information</strong></p>
                            </div>
                            <div class="col-8">
                                <p class="text-capitalize">{{ $scholarship->other_information }}</p>
                            </div>
                        </div><!-- End of Other information -->
                    @endif

                    <!-- Number of seats -->
                    <div class="row ce-information-item">
                        <div class="col-4">
                            <p class="ce-information-title text-right"><strong>Number of Seats</strong></p>
                        </div>
                        <div class="col-8">
                            <p class="text-capitalize">{{ $scholarship->number_of_seats }}</p>
                        </div>
                    </div><!-- End of number of seats -->

                     <!-- Application Deadline -->
                     <div class="row ce-information-item">
                        <div class="col-4">
                            <p class="ce-information-title text-right"><strong>Application Deadline</strong></p>
                        </div>
                        <div class="col-8">
                            <p class="text-capitalize">{{ $scholarship->application_deadline }}</p>
                        </div>
                    </div><!-- End of Application Deadline -->



                </div>
            </div>
        </div><!-- End of Scholarship's information -->

    </div>
</div>
@endsection

@section('scripts')
<!-- Smartphoto JS image viewer library -->
<script src="https://unpkg.com/smartphoto@1.0.1/js/smartphoto.min.js"></script>

<!-- dotdotdot.js for truncating text -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.dotdotdot/3.1.0/jquery.dotdotdot.js"></script>

<script type="text/javascript">
    jQuery( document ).ready( function() {
        new SmartPhoto(".js-smartPhoto");

        $(".dotdotdot-truncate").dotdotdot({
            height: 120
        });
    });
</script>
@endsection