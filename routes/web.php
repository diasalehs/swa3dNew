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
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/', ['uses'=>'mainController@main','as'=>'main']);
Route::get('/view/{newsId}',  ['uses' =>'newsController@view', 'as'=>'view']);
Route::get('/allNews',  ['uses' =>'newsController@allNews', 'as'=>'allNews']);
Route::get('/results/',  ['uses' =>'searchController@basic', 'as'=>'search']);
Route::get('/profile/{username}/{userId}/{userType}',  ['uses' =>'profilesController@index', 'as'=>'profile']);

Route::group(['prefix'=>'admin'], function() {
    // Route::get('/', array('as' => 'admin', function() {
    //     return view('admin/adminDashboard');
    // }));

    Route::get('/', 'adminController@index')->name('admin');
    Route::get('/userdelete/{userId}', ['uses' =>'adminController@delete', 'as'=>'delete_user']);
    Route::get('/news',  ['uses' =>'adminController@indexx', 'as'=>'news']);
    Route::post('/news', ['uses' =>'newsController@Create', 'as'=>'news']);
    Route::get('/news/delete/{newsId}', ['uses' =>'newsController@delete', 'as'=>'delete_news']);
    Route::get('/news/edit/{newsId}',  ['uses' =>'adminController@edit', 'as'=>'edit']);
    Route::post('/news/edit/{newsId}', ['uses' =>'newsController@editor', 'as'=>'edit']);
    Route::get('/news/adminNewsView',  ['uses' =>'adminController@adminNewsView', 'as'=>'adminNewsView']);

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


Route::group(['prefix'=>'home','routeMiddleware'=>'auth'], function() {

    Route::get('/', 'homeController@index')->name('home');

    Route::get('/allusers',['uses'=>'homeController@allusers'])->name('allusers');
    Route::get('/allusers/follow/{userId}', ['uses'=>'homeController@follow']);
    Route::get('/allusers/unfollow/{userId}', ['uses'=>'homeController@unfollow']);
    Route::get('/followers', ['uses'=>'homeController@followers'])->name('followers');
    Route::get('/following', ['uses'=>'homeController@following'])->name('following');

    Route::group(['prefix'=>'institute','routeMiddleware'=>'institute'], function() {
        Route::get('/', 'homeController@index')->name('home');

        Route::get('/findVolunteers',['uses'=>'instituteController@findVolunteers'])->name('findVolunteers');
        Route::get('/allusers/follow/{userId}', ['uses'=>'instituteController@follow']);
        Route::get('/allusers/unfollow/{userId}', ['uses'=>'instituteController@unfollow']);
        Route::get('/followers', ['uses'=>'instituteController@followers'])->name('followersInstitute');
        Route::get('/following', ['uses'=>'instituteController@following'])->name('followingInstitute');

        Route::get('/makeEvent', ['uses'=>'instituteController@makeEvent'])->name('makeEvent');
        Route::post('/event', ['uses'=>'instituteController@eventInstitute'])->name('eventInstitute');
        Route::get('/eventDelete/{eventId}', ['uses'=>'instituteController@eventDelete'])->name('eventDelete');
        Route::get('/myEvents', ['uses'=>'instituteController@myEvents'])->name('myEvents');
        Route::get('/archiveMyEvents', ['uses'=>'instituteController@archiveMyEvents'])->name('archiveMyEvents');
    });

});

Route::get('/upComingEvents', ['uses'=>'mainController@upComingEvents'])->name('upComingEvents');
Route::get('/archiveEvents', ['uses'=>'mainController@archiveEvents'])->name('archiveEvents');
Route::get('/event/{eventId}', ['uses'=>'mainController@event'])->name('event');
