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

Route::get('/', ['uses'=>'mainController@main','as'=>'main']);

Route::group(['prefix'=>'admin'], function() {
    Route::get('/', array('as' => 'admin', function() {
        return view('admin/adminDashboard');
    }));

    Route::get('/news', array('as' => 'news', function() {
    return view('admin/adminNews');
    }));

});


Auth::routes();

Route::post('/allRegister', ['uses'=>'registerStep2Controller@allRegister','as'=>'allRegister']);
Route::get('/home', 'homeController@index')->name('home');
Route::get('/step', ['uses'=>'stepController@step','as'=>'step']);
Route::get('/choose', ['uses'=>'chooseController@choose','as'=>'choose']);

Route::post('/registerer', function(\Illuminate\Http\Request $request) {
    return view('auth/register',['user_type'=>$request['submit']]);
})->name('registerer');
<<<<<<< HEAD
Route::get('/admin', 'adminController@index')->name('admin');
Route::get('/admin/delete/{userId}', ['uses' =>'adminController@delete', 'as'=>'delete_user']);

=======
Route::get('/admin', ['uses'=>'adminController@index','as'=>'admin']);
>>>>>>> 56bb88a56bb0d728dc52452234739c3d67acd2ed
});
