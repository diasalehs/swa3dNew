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
Route::group(['middleware' => ['web']], function () {

Route::get('/', array('as' => 'main', function() {
    return view('main');
}));

Route::post('/register', array('as' => 'register', [
	'uses' => 'registerController@postRegister',
	]));

Auth::routes();

Route::get('/registerStep2', 'registerStep2Controller@index')->name('registerStep2');

});