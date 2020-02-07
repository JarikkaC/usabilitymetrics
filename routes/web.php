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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/example', 'ExampleController@index')->name('example');
Route::get('/document', 'DocumentController@index')->name('document');
Route::get('/selectmetric', 'MetricController@index')->name('selectmetric');


Route::resource('/project','ProjectController');


// Route::resource('/showmetric','MetricController');
// Route::resource('selectmetric', 'MetricController');

// Route::get('/showmetric', 'MetricController@index')->name('showmetric');

