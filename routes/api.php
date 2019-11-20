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

Route::middleware('guest'/*'auth:api'*/)->prefix('v3')->namespace('Api')->group(function() {



    Route::get('/', function() {
        return 'yoo';
    });

    Route::apiResource('rentals', 'RentalController');
});
