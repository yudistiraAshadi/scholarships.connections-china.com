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

/**
 * Search routes.
 */
Route::group([
    'namespace' => 'Search',
    'prefix' => 'search'
], function () {
    
    // Scholarship search routes.
    Route::get('/advanced/scholarship/search-options',
        'Scholarship\SearchController@advancedSearchOptions');
    Route::post('/advanced/scholarship', 'Scholarship\SearchController@advancedSearch');
});
