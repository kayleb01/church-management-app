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
Auth::routes();
Route::get('/', 'dashboardController@index')->name('/');
Route::get('/new/people', 'dashboardController@userNew')->name('/new/people');
Route::get('/people', 'dashboardController@people');
 Route::get('users/', 'dashboardController@users')->name('/users');
 Route::get('user/', 'dashboardController@user')->name('/user');

 Route::get('events/', 'dashboardController@events');
 Route::get('view/groups', 'dashboardController@group')->name('view/groups');
 Route::get('/new/group', 'dashboardController@newGroup');
 Route::get('group/edit', 'dashboardController@edit_group')->name('group/edit');

Route::get('/events', 'dashboardController@events')->name('/events');
Route::get('/new/event', 'dashboardController@newEvent');

Route::get('/view/contribution', 'dashboardController@contribution');
Route::get('/new/contribution', 'dashboardController@Addcontri');

Route::get('/followup', 'dashboardController@followup');
Route::get('/followup/add', 'dashboardController@followupAdd');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/form', 'dashboardController@form');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
