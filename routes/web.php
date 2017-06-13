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
Route::get('/view/{newsId}',  ['uses' =>'newsController@view', 'as'=>'view']);
Route::get('/allNews',  ['uses' =>'newsController@allNews', 'as'=>'allNews']);


Route::group(['prefix'=>'admin'], function() {
    // Route::get('/', array('as' => 'admin', function() {
    //     return view('admin/adminDashboard');
    // }));

    Route::get('/', 'adminController@index')->name('admin');
    Route::get('/userdelete/{userId}', ['uses' =>'adminController@delete', 'as'=>'delete_user']);
    Route::get('/news',  ['uses' =>'newsController@index', 'as'=>'news']);
    Route::post('/news', ['uses' =>'newsController@Create', 'as'=>'news']);
    Route::get('/news/delete/{newsId}', ['uses' =>'newsController@delete', 'as'=>'delete_news']);
    Route::get('/news/edit/{newsId}', ['uses' =>'newsController@edit', 'as'=>'edit']);
    Route::post('/news/edit/{newsId}', ['uses' =>'newsController@editor', 'as'=>'edit']);
    Route::get('/news/adminNewsView',  ['uses' =>'newsController@adminNewsView', 'as'=>'adminNewsView']);

    Route::post('/slider',['uses' =>'sliderController@add_element', 'as'=>'slider']);
    Route::get('/slider', ['uses' =>'sliderController@index', 'as'=>'slider']);
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
Route::get('/allusers',['uses'=>'allusers@allusers'])->name('allusers');
Route::get('/allusers/follow/{userId}', ['uses'=>'allusers@follow']);
Route::get('/allusers/unfollow/{userId}', ['uses'=>'allusers@unfollow']);
Route::get('/followers', ['uses'=>'allusers@followers'])->name('followers');
Route::get('/following', ['uses'=>'allusers@following'])->name('following');

});
