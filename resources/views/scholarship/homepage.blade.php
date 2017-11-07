@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Search Scholarship Form</div>

                <div class="panel-body">
                    <scholarship-search-form></scholarship-search-form>
                </div>
                
                <!-- Search results table -->
                <scholarship-search-results></scholarship-search-results>
            </div>
            
        </div>
    </div>
</div>
@endsection
