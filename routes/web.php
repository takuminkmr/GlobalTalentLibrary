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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('admin-register');

// Route::view('/admin', 'admin')->middleware('auth:admin')->name('admin-home');

Route::get('/thanks', 'HomeController@thanks')->name('thanks');
Route::get('/detail/{id}', 'DetailController@index')->name('detail');
Route::get('/apply/{id}', 'ApplyController@show')->name('apply');
Route::post('/complete', 'ApplyController@complete')->name('complete');
Route::get('/{id}/interest', 'InterestController@index')->name('interest');
Route::post('/interest/add', 'InterestController@add')->name('interest.add');
Route::post('/interest/destroy', 'InterestController@destroy')->name('interest.destroy');
Route::get('/{id}/history', 'HistoryController@index')->name('history');
// Route::get('/{id}/profile', 'ProfileController@index')->name('profile');
// Route::get('/{id}/edit', 'EditController@index')->name('edit');
// Route::get('/{id}/confirm', 'ConfirmController@index')->name('confirm');
Route::get('/opinion', 'OpinionController@index')->name('opinion');
Route::post('/opinion/add', 'OpinionController@add')->name('opinion.add');
Route::post('/opinion/todo', 'OpinionController@todo')->name('opinion.todo');

Route::group(['prefix' => 'gt', 'middleware' => 'auth:admin'], function () {
    Route::get('index', 'GtController@index')->name('gt.index');
    Route::get('create', 'GtController@create')->name('gt.create');
    Route::post('store', 'GtController@store')->name('gt.store');
    Route::get('show/{id}', 'GtController@show')->name('gt.show');
    Route::get('edit/{id}', 'GtController@edit')->name('gt.edit');
    Route::post('update/{id}', 'GtController@update')->name('gt.update');
    Route::post('destroy/{id}', 'GtController@destroy')->name('gt.destroy');
    Route::get('interest-index', 'GtController@interestIndex')->name('gt.interest-index');
});

Route::group(['prefix' => 'userProfile', 'middleware' => 'auth:web'], function () {
    Route::get('show/{id}', 'UserProfileController@show')->name('userProfile.show');
    Route::get('edit/{id}', 'UserProfileController@edit')->name('userProfile.edit');
    Route::post('update/{id}', 'UserProfileController@update')->name('userProfile.update');
    // Route::get('password/edit/{id}', 'UserProfileController@editPassword')->name('userProfile.password.edit');
    Route::post('password/{id}', 'UserProfileController@updatePassword')->name('userProfile.password.update');
});