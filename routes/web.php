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
Route::get('/document', 'DocumentController@index')->name('document');
Route::get('metric/addmetric', 'MetricController@create');
Route::get('evaluation/upload', 'PictureController@create');
Route::get('/logout', 'Auth\LoginController@logout'); // logout
Route::resource('/evaluation','PictureController');
// Route::resource('/selectmetric', 'MetricController');
Route::resource('/project','ProjectController');
Route::resource('/metric','MetricController');
// Route::resource('/form','QuestionController');
Route::resource('/report', 'AnswerController');
// Route::resource('/addmetric','AddModelController');




