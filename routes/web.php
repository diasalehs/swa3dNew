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
Route::get('/', ['uses'=>'mainController@main','as'=>'main']);

Route::get('/news',function() {
   return view('singleNews');
})->name('news');
Route::group(['prefix'=>'admin'], function() {
    // Route::get('/', array('as' => 'admin', function() {
    //     return view('admin/adminDashboard');
    // }));

    Route::get('/', 'adminController@index')->name('admin');
    Route::get('/userdelete/{userId}', ['uses' =>'adminController@delete', 'as'=>'delete_user']);
    Route::get('/news', ['uses' =>'newsController@index', 'as'=>'news']);
    Route::post('/news', ['uses' =>'newsController@Create', 'as'=>'news']);
    Route::get('/news/delete/{newsId}', ['uses' =>'newsController@delete', 'as'=>'delete_news']);



});


Auth::routes();
Route::post('/allRegister', ['uses'=>'registerStep2Controller@allRegister','as'=>'allRegister']);
Route::get('/step', ['uses'=>'stepController@step','as'=>'step']);
Route::get('/choose', ['uses'=>'chooseController@choose','as'=>'choose']);

Route::post('/registerer', function(\Illuminate\Http\Request $request) {
    return view('auth/register',['user_type'=>$request['submit']]);
})->name('registerer');


Route::group(['prefix'=>'home'], function() {

Route::get('/', 'homeController@index')->name('home');

Route::get('/allusers',['uses'=>'allusers@index'])->name('allusers');

Route::get('/allusers/{userId}', ['uses'=>'allusers@store']);
Route::get('/followers', ['uses'=>'allusers@create'])->name('followers');
Route::get('/following', ['uses'=>'allusers@show'])->name('following');
});
