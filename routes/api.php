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

Route::resource('project','Api\ProjectController');
Route::resource('pictures','Api\PictureController');
Route::resource('metrics','Api\MetricController');
Route::resource('submetrics', 'Api\SubmetricController');
Route::resource('metricmodel', 'Api\ModelController');
Route::resource('questions', 'Api\QuestionController');
Route::resource('reports', 'Api\ReportController');


