<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('scholarship.homepage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', function() {
    $results = App\University::search('ltd')
        ->within('universities_name_only_asc')
        ->get();
    
    $results_gov_district = App\University::search('michigan')
        ->within('universities_governing_district_only_asc')
        ->get();
    

    $scholarships = App\Scholarship::search()->get();

    $results = $results->merge($results_gov_district);
    
    dd($scholarships);
});