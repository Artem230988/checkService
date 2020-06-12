<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('layouts.layout');
});
Route::resource('/checks', 'ChecksController');
// Route::get('/checks', 'ChecksController@index')->name('check.index');
// Route::get('/checks/create/', 'ChecksController@create')->name('check.create');
// Route::get('/checks/{check}', 'ChecksController@show')->name('check.show');
// Route::post('/checks', 'ChecksController@store')->name('check.store');
// Route::get('/checks/{check}/edit', 'ChecksController@edit')->name('check.edit');
// Route::patch('/checks/{check}', 'ChecksController@update')->name('check.update');
// Route::delete('/checks/{check}', 'ChecksController@destroy')->name('check.destroy');


Route::post('/checks/{check}/steps', 'StepsController@store')->name('step.store');
Route::get('/checks/{check}/steps/{step}', 'StepsController@edit')->name('step.edit');
Route::patch('/checks/{check}/steps/{step}', 'StepsController@update')->name('step.update');
Route::delete('/checks/{check}/steps/{step}', 'StepsController@destroy')->name('step.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admins', 'AdminsController@index')->name('admin.index');
Route::get('/admins/{id}', 'AdminsController@show')->name('admin.show');
Route::get('/admins/{id}/edit', 'AdminsController@edit')->name('admin.edit');
Route::patch('/admins/{id}', 'AdminsController@update')->name('admin.update');

Route::get('/users', 'UsersController@index')->name('user.index');
Route::get('/users/{id}', 'UsersController@show')->name('user.show');
Route::get('/users/{id}/edit', 'UsersController@edit')->name('user.edit');
Route::patch('/users/{id}', 'UsersController@update')->name('user.update');

Route::post('/admins/{user}/permissions/{name}', 'PermissionsController@store')->name('permission.store');
Route::delete('/admins/{user}/permissions/{permission}', 'PermissionsController@destroy')->name('permission.destroy');

Route::get('/users/{user}/showchecks/', 'ShowChecksController@index')->name('showCheck.index');
Route::get('/users/{user}/showchecks/{check}', 'ShowChecksController@show')->name('showCheck.show');
