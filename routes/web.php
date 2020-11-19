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
Route::get('/', 'dashboardController@index')->name('/')->middleware('auth');
Route::get('/registered', 'Auth\RegisterController@registered');



Route::get('/new/people', 'dashboardController@userNew')->name('/new/people')->middleware('auth');
Route::get('/people', 'PeopleController@index')->middleware('auth');
Route::get('/peoples', 'PeopleController@show')->middleware('auth');
Route::delete('people/{id}', 'PeopleController@destroy')->middleware('auth');
Route::post('/people/add', 'PeopleController@store')->middleware('auth');
Route::patch('/people/{id}/update', 'PeopleController@update')->middleware('auth');
Route::get('/people/{id}', 'PeopleController@details')->middleware('auth');





Route::get('users/', 'adminUserController@users')->name('/users')->middleware('auth');
Route::get('userdata', 'adminUserController@index')->middleware('auth');
Route::get('/u/{id}', 'adminUserController@profile')->middleware('auth');
Route::get('user/', 'dashboardController@user')->name('/user')->middleware('auth');
Route::delete('user/{id}', 'adminUserController@destroy')->middleware('auth');
Route::post('/admin/adduser', 'adminUserController@create')->middleware('auth');
Route::patch('/admin/{id}/adduser', 'adminUserController@update')->middleware('auth');


 
 Route::get('view/group', 'GroupController@index')->middleware('auth');
 Route::get('/groups', 'GroupController@show')->middleware('auth');
 Route::post('/group/add', 'GroupController@store')->middleware('auth');
 Route::patch('/group/{id}/edit', 'GroupController@update')->middleware('auth');
 Route::delete('/group/{id}', 'GroupController@destroy')->middleware('auth');


Route::get('/new/event', 'dashboardController@newEvent')->middleware('auth');

Route::get('/view/contribution', 'dashboardController@contribution')->middleware('auth');
Route::get('/new/contribution', 'dashboardController@Addcontri')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/form', 'dashboardController@form')->middleware('auth');

//User Notes
Route::get('/notes/{id}', 'NoteController@index')->middleware('auth');
Route::post('/note/add', 'NoteController@store')->middleware('auth');
Route::patch('/note/{id}/edit', 'NoteController@update')->middleware('auth');
Route::delete('/note/{id}', 'NoteController@destroy')->middleware('auth');

//Person notes
Route::get('/peep/notes/{id}', 'PeopleController@notes')->middleware('auth');
Route::post('/note/peep', 'PeopleController@put')->middleware('auth');
Route::patch('/note/{id}/peep', 'PeopleController@update_note')->middleware('auth');
Route::delete('/peep/note/{id}', 'PeopleController@destroy_note')->middleware('auth');


Route::get('/events', 'EventController@index')->middleware('auth');
Route::get('/event', 'EventController@show')->middleware('auth');
Route::post('/event/add', 'EventController@store')->middleware('auth');
Route::patch('/event/{id}/edit', 'EventController@update')->middleware('auth');
Route::delete('/event/{id}', 'EventController@destroy')->middleware('auth');

Route::get('/followup', 'FollowupController@index')->middleware('auth');
Route::get('/followups', 'FollowupController@show')->middleware('auth');
Route::post('/followup/add', 'FollowupController@store')->middleware('auth');
Route::patch('/followup/{id}/edit', 'FollowupController@update')->middleware('auth');
Route::delete('/followup/{id}', 'FollowupController@destroy')->middleware('auth');
Route::post('/markdone/{id}', 'FollowupController@mark')->middleware('auth');

Route::post('/action/add', 'ActionController@store')->middleware('auth');
Route::get('/actions', 'ActionController@index')->middleware('auth');


Auth::routes();

