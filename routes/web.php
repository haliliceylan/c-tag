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
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function(){
  Route::get('/','AdminPageController@index')->name('dashboard');
  Route::get('/platform/{platform}','AdminPageController@platform')->name('platform');
  Route::get('/tag/{connectionTag}','AdminPageController@tag')->name('tag');
});
