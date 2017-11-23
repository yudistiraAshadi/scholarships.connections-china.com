@extends('layouts.app')

@section('content')
<div class="container-fluid ce-search-scholarship py-3">
    <!-- Scholarship Search Form Row -->
    <div class="row ce-scholarship-search-form-row px-0 py-3 mx-0">
        <scholarship-search-form
            :first-query="{
                'scholarshipType': '{{ $scholarshipType }}',
                'university': '{{ $university }}',
                'degreeType': '{{ $degreeType }}',
                'programLanguage': '{{ $programLanguage }}',
                'program': '{{ $program }}'
            }"
            :class-names="{
                'search-form': 'container-fluid',

                'search-form__scholarship-type': 'form-group row',
                'search-form__scholarship-type__label': 'col-md-2 col-sm-12',
                'search-form__scholarship-type__input-wrapper': 'col-md-10 col-sm-12',

                'search-form__university-name': 'form-group row',
                'search-form__university-name__label': 'col-md-2 col-sm-12',
                'search-form__university-name__input-wrapper': 'col-md-10 col-sm-12',

                'search-form__degree-type': 'form-group row',
                'search-form__degree-type__label': 'col-md-2 col-sm-12',
                'search-form__degree-type__input-wrapper': 'col-md-10 col-sm-12',
                
                'search-form__program-language': 'form-group row',
                'search-form__program-language__label': 'col-md-2 col-sm-12',
                'search-form__program-language__input-wrapper': 'col-md-10 col-sm-12',

                'search-form__program': 'form-group row',
                'search-form__program__label': 'col-md-2 col-sm-12',
                'search-form__program__input-wrapper': 'col-md-10 col-sm-12',

                'search-form__submit-btn': 'form-group row',
                'search-form__submit-btn__btn-wrapper': 'col-md-10 offset-md-2 col-sm-12',
                'search-form__submit-btn__btn': 'btn btn-primary'

            }">
        </scholarship-search-form>
    </div><!-- End of Scholarship Search Form Row -->


    <!-- Scholarship Search Result -->
    <div class="row ce-scholarship-search-results-row px-0 mx-0 pt-3 mt-3">
        <scholarship-search-results></scholarship-search-results>
    </div><!-- End of Scholarship Search Result -->

</div>
@endsection
