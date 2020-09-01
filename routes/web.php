<?php

use App\Http\Middleware;
use App\Http\Resources\DailyValueResource as DailyValueResource;
use App\Http\Resources\ColorBraceletsResource as ColorBraceletsResource;
use App\Camping;
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


Route::group(['middleware' => ['auth']], function () {

	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');

	// Route::group(['middleware' => ['roles']], function () {

	Route::any('/perfil', 'ProfilesController@perfil');
	Route::post('/profiles/default', 'ProfilesController@defaultProfile');
	Route::get('/reports/generate/{id}', 'ReportsController@generate');

	Route::resource('users', 'UsersController');

	Route::resource('permissions', 'PermissionsController');
	Route::resource('profiles', 'ProfilesController');
	Route::resource('logs', 'LogsController');

	Route::resource('indicators', 'IndicatorsController');
	Route::resource('reports', 'ReportsController');

	Route::get('/dailyValue', function () {
		//dd(Camping::find(1));
		return new DailyValueResource(Camping::find(1));
	});

	Route::get('/colorBracelets', function () {
		//dd(Camping::find(1));
		return new ColorBraceletsResource(Camping::find(1));
	});

	//Route::resource('camping', 'CampingController');
	Route::get('camping', 'CampingController@index');
	Route::post('camping/SeatLimit', 'CampingController@SeatLimit');
	Route::post('camping/CurrentTariff', 'CampingController@CurrentTariff');
	Route::post('camping/ControlBracelets', 'CampingController@ControlBracelets');


	Route::get('search', 'SearchController@index');
	Route::post('searchName ', 'SearchController@SearchName');
	Route::post('searchPhone ', 'SearchController@searchPhone');
	Route::post('searchCpf ', 'SearchController@searchCpf');
	Route::post('searchModelCar ', 'SearchController@searchModelCar');
	Route::post('searchPlaca ', 'SearchController@searchPlaca');
	Route::post('searchColor ', 'SearchController@searchColor');
	Route::post('searchEmail ', 'SearchController@searchEmail');
	Route::post('searchCheckin ', 'SearchController@searchCheckin');

	Route::post('indicators/paymentStatus/{id} ', 'IndicatorsController@paymentStatus');





	// });

});


Route::get('event', 'EventController@Index');
Route::post('event/store', 'EventController@Store');
Route::get('event/view', 'EventController@View');
Route::post('event/cpf', 'EventController@Cpf');



Auth::routes();
