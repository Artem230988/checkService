<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function() {

Route::apiResource('/checks', 'Api\ApiChecksController');

Route::get('/checks/{check}/steps/', 'Api\ApiStepsController@index');
Route::get('/checks/{check}/steps/{step}', 'Api\ApiStepsController@show');
Route::post('/checks/{check}/steps/', 'Api\ApiStepsController@store');
Route::put('/checks/{check}/steps/{step}', 'Api\ApiStepsController@update');
Route::delete('/checks/{check}/steps/{step}', 'Api\ApiStepsController@destroy');

});


