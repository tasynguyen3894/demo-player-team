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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth_api:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::middleware(['auth_api:api'])->prefix('admin')->group(function () {
    Route::prefix('countries')->group(function () {
        Route::get('/', 'CountryController@get')->name('api.countries.get');
        Route::get('/{countryId}', 'CountryController@find')->name('api.countries.find');
    });
    
    Route::prefix('teams')->group(function () {
        Route::get('/', 'TeamController@get')->name('api.teams.get');
        Route::post('/', 'TeamController@create')->name('api.teams.post');
        Route::get('/{teamsId}', 'TeamController@find')->name('api.teams.find');
        Route::put('/{teamsId}', 'TeamController@update')->name('api.teams.update');
        Route::delete('/{teamsId}', 'TeamController@delete')->name('api.teams.delete');
    });
    
    Route::prefix('players')->group(function () {
        Route::get('/', 'PlayerController@get')->name('api.players.get');
        Route::get('/{teamsId}', 'PlayerController@find')->name('api.players.find');
    });
});
