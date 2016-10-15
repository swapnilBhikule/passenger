<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(['middleware' => 'guest', 'namespace' => 'Home'], function() {
	Route::get('/', 'LoginController@getSignIn')->name('guest.index');
	Route::post('/post-sign-in', 'LoginController@postSignIn')->name('guest.postSignIn');
	Route::post('/post-sign-up', 'RegisterController@postSignUp')->name('guest.postSignUp');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Home'], function() {
	Route::get('logout', 'LoginController@getLogout')->name('user.getLogout');
});

Route::group(['middleware' => 'auth', 'namespace' => 'User'], function() {
	Route::get('/dashboard', 'UserController@getDashboard')->name('user.getDashboard');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Vault'], function() {
	Route::post('/post-add-account', 'VaultController@postAddAccount')->name('user.postAddAccount');
	Route::post('/post-delete-account', 'VaultController@postDeleteAccount')->name('user.postDeleteAccount');
	Route::post('/post-edit-account', 'VaultController@postEditAccount')->name('user.postEditAccount');
});