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
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::group(['middleware' => ['SentinelAuth:guest']], function () {
        Route::get('/login', 'AdminPageController@login')->name('login');
        Route::post('/login', 'AdminPageController@auth')->name('auth');
    });
    Route::group(['middleware' => ['SentinelAuth:auth']], function () {
        Route::get('/logout', 'AdminPageController@logout')->name('logout');
        Route::get('/', 'AdminPageController@index')->name('index');
        Route::resource('/tag', 'ConnectionTagController', ['parameters' => ['tag' => 'connectionTag'],'only' => ['index','show','edit','update']]);
        Route::get('/tag/{connectionTag}/reset', 'ConnectionTagController@reset')->name('tag.reset');
        Route::get('/tag/{connectionTag}/qc-code', 'ConnectionTagController@qrcode')->name('tag.qrcode');
        Route::group(['as' => 'qrcode.','prefix' => 'qrcode'], function () {
          Route::get('/','QRCodeController@form')->name('index');
          Route::get('/website','QRCodeController@website')->name('website');
          Route::get('/wifi','QRCodeController@wifi')->name('wifi');
        });
    });
});
