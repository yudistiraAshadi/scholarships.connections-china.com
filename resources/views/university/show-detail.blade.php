@extends('layouts.app')

@section('styles')
<!-- Smartphoto JS image viewer library -->
<link rel="stylesheet" href="https://unpkg.com/smartphoto@1.0.1/css/smartphoto.min.css">
@endsection

@section('content')
<div class="container-fluid ce-university-show-detail pt-3">
     <!-- University basic information -->
     <div class="row ce-university-basic-information">
        <div class="col-12">
            <div class="card text-center">
                <div class="card-body">
                    <!-- University's logo -->
                    <img
                        src="{{ $university->logo }}"
                        alt="{{ $university->name }}'s logo'"
                        class="ce-university-logo rounded-circle img-thumbnail mb-4">

                    <!-- Name -->
                    <h2 class="card-title mb-4"><strong>{{ $university->name }}</strong></h2>

                    @if ( isset( $university->introduction ) )
                        <p class="card-text text-left">{{ $university->introduction }}</p>
                    @else
                        <p class="card-text text-center font-italic">No introduction</p>
                    @endif
                </div>
            </div>
        </div>
    </div><!-- End of University basic information -->

     <!-- University other information -->
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title mb-3"><strong>About</strong></h5>
                    <!-- Address -->
                    <ul class="fa-ul">
                        <li>
                            <i class="fa-li fa-lg fa fa-map-marker text-muted"></i>
                            <p class="text-capitalize text-left">
                                {{ $university->country }},
                                &nbsp;{{ $university->governing_district }},
                                &nbsp;{{ $university->major_municipality }}
                                @if ( isset( $university->minor_municipality ) )
                                    ,&nbsp;{{ $university->minor_municipality }}
                                @endif
                                @if ( isset( $university->detailed_address ) )
                                    ,&nbsp;{{ $university->detailed_address }}
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

                    <h5 class="card-title mb-3"><strong>Photos</strong></h5>
                    <div class="row">
                    @if ( isset( $university->photos ) )
                        @foreach ( explode( '|', $university->photos ) as $photo )
                            <div class="col-lg-3 col-md-4 col-6">
                                <a
                                    href="{{ $photo }}"
                                    class="js-smartPhoto"/>
                                    <img
                                        src="{{ $photo }}"
                                        alt="{{ $university->name }}'s photo'"
                                        class="img-fluid img-thumbnail rounded mb-3">
                                </a>
                            </div>
                        @endforeach
                    @else
                        <p class="card-text font-italic">No photos</p>
                    @endif
                    </div>
                </div>
            </div>       
        </div>
    </div><!-- End of University photos -->


    <!-- Scholarship in the university -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title mb-3"><strong>All Scholarships</strong></h5>

                     <!-- Scholarship Search Form Row -->
                     <scholarship-search-form hidden
                        :first-query="{
                            'university': '{{ $university->id }}'
                        }">
                    </scholarship-search-form>

                     <scholarship-search-results></scholarship-search-results>

                </div>
            </div>
        </div>
    </div><!-- End of Scholarship in the university -->

</div>
@endsection

@section('scripts')
<!-- Smartphoto JS image viewer library -->
<script src="https://unpkg.com/smartphoto@1.0.1/js/smartphoto.min.js"></script>

<script type="text/javascript">
    jQuery( document ).ready( function() {
        new SmartPhoto(".js-smartPhoto");
    });
</script>
@endsection