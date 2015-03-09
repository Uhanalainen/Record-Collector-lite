<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::model('album', 'Album');
Route::model('artist', 'Artist');

Route::get('/', 'AlbumsController@index');
Route::get('/artists/{id}/delete', 'ArtistsController@delete');
Route::post('/artists/{id}/delete', 'ArtistsController@destroy');
Route::get('/albums/{id}/delete', 'AlbumsController@delete');
Route::resource('albums', 'AlbumsController');
Route::resource('artists', 'ArtistsController');