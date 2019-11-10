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
Route::get('MiApp', function () {

    return 'Esta es mi aplicación';
});

Route::get('/apiario','ApiarioController@index');
Route::get('/reports', 'ReportsController@index');
Route::get('/statistics', 'StatisticsController@index');
Route::get('/estimates', 'EstimateController@index');
Route::get('/analysis', 'AnalysisController@index');
Route::get('/help', 'HelpController@index');
Route::get('/home', 'HomeController@index');

Route::resource('controler', 'Controller');

Route::post('/Statistics', 'StatisticsController@store');
Route::post('/Analysis', 'AnalysisController@store');

Route::name('consultar')->get('/consultar','Controller@consultar');
Route::name('estimar')->get('/estimar','EstimateController@estimar');
Route::name('imprimirCompleto')->get('/imprimirCompleto', 'ReportsController@imprimirCompleto');
Route::name('imprimirFranja1')->get('/imprimirFranja1', 'ReportsController@imprimirFranja1');
Route::name('imprimirFranja2')->get('/imprimirFranja2', 'ReportsController@imprimirFranja2');
Route::name('imprimirFranja3')->get('/imprimirFranja3', 'ReportsController@imprimirFranja3');
Route::name('imprimirFranja4')->get('/imprimirFranja4', 'ReportsController@imprimirFranja4');



Auth::routes();
