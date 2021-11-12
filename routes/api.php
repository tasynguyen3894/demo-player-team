<?php

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('countries')->group(function () {
    Route::get('/', 'CountryController@get')->name('api.countries.get');
    Route::get('/{countryId}', 'CountryController@find')->name('api.countries.find');
});

Route::prefix('teams')->group(function () {
    Route::get('/', 'TeamController@get')->name('api.teams.get');
    Route::get('/{teamsId}', 'TeamController@find')->name('api.teams.find');
});

Route::prefix('players')->group(function () {
    Route::get('/', 'PlayerController@get')->name('api.players.get');
    Route::get('/{teamsId}', 'PlayerController@find')->name('api.players.find');
});

Route::get('/test', function (Request $request) {
    return response()->json([
        'status' => true
    ], 200);
});