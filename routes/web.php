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
    return view('welcome');
});

Route::resource('quotes','QuoteController');
Route::get('quotes/{quote_id}/resend_email', ['as'=>'quotes.resend_email', 'uses'=>'QuoteController@resendEmail']);

//Api
Route::group(['prefix' => 'api'], function () {
    Route::get('people/{cpf}', ['as'=>'api.people.show', 'uses'=>'Api\PeopleController@show']);
    Route::get('vehicle/{number}', ['as'=>'api.vehicle.show', 'uses'=>'Api\VehicleController@show']);
    Route::get('vehicle/models_by_brand/{number}', ['as'=>'api.vehicle.models_by_brand', 'uses'=>'Api\VehicleController@modelsByBrand']);
    Route::get('location/by_cep/{cep}', ['as'=>'api.location.by_cep', 'uses'=>'Api\LocationController@byCep']);
});

Route::group(['prefix' => 'landing_page'], function () {
    Route::get('cotacao', ['as'=>'lading_page.cotacao', 'uses'=>'LandingPageController@cotacao']);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
