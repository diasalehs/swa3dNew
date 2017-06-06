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
Route::get('/admin', array('as' => 'main', function() {
    return view('adminDashboard');
}));


Auth::routes();

Route::get('/registerStep2', 'registerStep2Controller@index')->name('registerStep2');
Route::get('/IndividualRegister', 'IndividualRegister@index')->name('IndividualRegister');
Route::get('/InstituteRegister', 'InstituteRegister@index')->name('InstituteRegister');
Route::get('/ResearcherRegister', 'ResearcherRegister@index')->name('ResearcherRegister');

Route::get('/choose', 'chooseController@index')->name('choose');
Route::get('/home', 'homeController@index')->name('home');

});