<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Model routes, to send models data via REST API.
 */
Route::group([
    'namespace' => 'Model',
    'prefix' => 'model'
], function () {

    // Static model routes.
    Route::get('/statics/degree-type', 'Statics\DegreeTypeController@index');
    Route::get('/statics/program-language', 'Statics\ProgramLanguageController@index');
    Route::get('/statics/scholarship-type', 'Statics\ScholarshipTypeController@index');

    // Other model routes.
    Route::get('/university', 'UniversityController@index');
});


/**
 * Search routes.
 */
Route::group([
    'namespace' => 'Search',
    'prefix' => 'search'
], function () {
    
    // Scholarship search routes.
    Route::post('/advanced/scholarship', 'Scholarship\SearchController@advancedSearch');
});