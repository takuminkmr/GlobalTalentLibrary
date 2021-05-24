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
    return view('top');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('applicationForm');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/detail/{id}', 'DetailController@index')->name('detail');
Route::get('/apply/{id}', 'ApplyController@show')->name('apply');
Route::post('/complete', 'ApplyController@complete')->name('complete');
Route::get('/{id}/interest', 'InterestController@index')->name('interest');
Route::POST('/interest/add', 'InterestController@add')->name('interest.add');
Route::get('/{id}/history', 'HistoryController@index')->name('history');
Route::get('/{id}/profile', 'ProfileController@index')->name('profile');
Route::get('/{id}/edit', 'EditController@index')->name('edit');
Route::get('/{id}/confirm', 'ConfirmController@index')->name('confirm');

Route::group(['prefix' => 'gt', 'middleware' => 'auth'], function(){
    Route::get('index', 'GtController@index')->name('gt.index');
    Route::get('create', 'GtController@create')->name('gt.create');
    Route::post('store', 'GtController@store')->name('gt.store');
    Route::get('show/{id}', 'GtController@show')->name('gt.show');
    Route::get('edit/{id}', 'GtController@edit')->name('gt.edit');
    Route::post('update/{id}', 'GtController@update')->name('gt.update');
    Route::post('destroy/{id}', 'GtController@destroy')->name('gt.destroy');
});