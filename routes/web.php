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

Route::get('/', function() {
    return view('main');
})->name('main');

Route::group(['prefix'=>'admin'], function() {
    Route::get('/', array('as' => 'admin', function() {
        return view('admin/adminDashboard');
    }));

    Route::get('/news', array('as' => 'news', function() {
    return view('admin/adminNews');
    }));

});


Auth::routes();
Route::get('/IndividualRegister', 'IndividualRegister@index')->name('IndividualRegister');
Route::get('/InstituteRegister', 'InstituteRegister@index')->name('InstituteRegister');
Route::get('/ResearcherRegister', 'ResearcherRegister@index')->name('ResearcherRegister');
Route::get('/home', 'homeController@index')->name('home');
Route::get('/step', 'registerStep2Controller@index')->name('step');
Route::get('/choose', function() {return view('choose');})->name('choose');

Route::post('/registerer', function(\Illuminate\Http\Request $request) {
    return view('auth/register',['user_type'=>$request['submit']]);
})->name('registerer');


});
