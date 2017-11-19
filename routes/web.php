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

Auth::routes();

/**
 * Homepage
 */
Route::get('/', 'HomepageController@index');

/**
 * Scholarship detail page
 */ 
Route::get('/scholarship/{id}', 'ScholarshipController@show');

/**
 * Search pages
 */
Route::group([
    'namespace' => 'Search',
    'prefix' => 'search'
], function () {

    // Search Scholarship
    Route::get('/scholarship', 'Scholarship\SearchController@index')->name('search.scholarship');
});