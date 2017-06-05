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

Route::get('/', array('as' => 'main', function() {
    return view('main');
}));

Route::get('/signup', array('as' => 'signup', function()
{
    return view('signup');
}));

Route::post('/register', [
		'uses' => 'registerController@postRegister',
		'as' => 'register'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
