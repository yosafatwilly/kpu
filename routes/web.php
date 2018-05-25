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
    return view('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('pemilu', 'PemiluController');

Route::resource('paslon', 'PaslonController');

Route::resource('vote', 'VoteController');

Route::post('vote/store/{id}', 'VoteController@store')->name('vote.store.id');

Route::resource('registerpemilu', 'UserHasPemiluController');

Route::resource('profile', 'ProfileController');

Route::get('paslon/create/{pemilu_id}', 'PaslonController@create')->name('paslon.create.id');

Route::get('profile', 'PemiluController@profile')->name('profile');

Route::post('pemilu/reg/{pemilu_id}', 'PemiluController@reg')->name('pemilu.reg');

Route::resource('result', 'ResultController');