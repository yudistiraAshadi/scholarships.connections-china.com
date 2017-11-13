@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="row">
                <!-- University's information -->
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <img
                                    src="{{ $scholarship->university->logo }}"
                                    alt="{{ $scholarship->university->name }}'s logo"
                                    class="img-circle center-block"
                                    style="width: 140px; height: 140px;">
                                <p class="text-center" style="margin-top: 15px;">
                                    <strong>{{ $scholarship->university->name }}</strong>
                                </p>
                                <p class="text-center">
                                    {{ $scholarship->university->introduction }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of university's information -->

                <!-- scholarship's information -->
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Degree</h3>
                                    <p>{{ $scholarship->degreeType->type }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Program</h3>
                                    <p>{{ $scholarship->program }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Study Language</h3>
                                    <p>{{ $scholarship->programLanguage->language }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Benefits</h3>
                                    <ul>
                                        @foreach (explode('|', $scholarship->benefits) as $benefit)
                                        <li>{{ $benefit }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Requirements</h3>
                                        <ul>
                                            @foreach (explode('|', $scholarship->requirements) as $requirement)
                                            <li>{{ $requirement }}</li>
                                            @endforeach
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
