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
Route::get('/researchView/{researchID}',['uses'=>'mainController@researchView','as'=>'researchView']);
Route::get('/researchView/download/{researchID}',['uses'=>'mainController@download','as'=>'download']);
Route::get('/view/{newsId}',  ['uses' =>'newsController@view', 'as'=>'view']);
Route::get('/allNews',  ['uses' =>'newsController@allNews', 'as'=>'allNews']);
Route::get('/results/',  ['uses' =>'searchController@basic', 'as'=>'search']);
Route::get('/profile/{userId}',  ['uses' =>'profilesController@index', 'as'=>'profile']);
Route::get('/profilerank/{id}',  ['uses' =>'profilesController@rank', 'as'=>'rank']);
Auth::routes();
Route::post('/allRegister', ['uses'=>'registerStep2Controller@allRegister','as'=>'allRegister']);
Route::get('/step', ['uses'=>'stepController@step','as'=>'step']);
Route::get('/choose', ['uses'=>'chooseController@choose','as'=>'choose']);
Route::post('/registerer', function(\Illuminate\Http\Request $request) {
    return view('auth/register',['user_type'=>$request['submit']]);
})->name('registerer');
Route::group(['prefix'=>'home','routeMiddleware'=>'auth'], function() {
    Route::get('/', 'homeController@index')->name('home');
    Route::get('/researcher',['uses'=>'homeController@researcher'])->name('researcher');
    Route::get('/addresearch',['uses'=>'homeController@addResearch'])->name('addResearch');
    Route::post('/addresearch',['uses'=>'homeController@submitResearch'])->name('addResearch');
    Route::get('/message/{receiverId?}', ['uses'=>'homeController@message'])->name('message');
    Route::post('/sendMessage/{receiverId?}', ['uses'=>'homeController@sendMessage'])->name('sendMessage');
    Route::group(['prefix'=>'admin' , 'routeMiddleware'=>'admin'], function() {
        Route::get('/userdelete/{userId}', ['uses' =>'adminController@delete', 'as'=>'delete_user']);
        Route::group(['prefix'=>'news'], function() {
            Route::get('/',  ['uses' =>'adminController@indexx', 'as'=>'news']);
            Route::post('/', ['uses' =>'newsController@Create', 'as'=>'news']);
            Route::get('/delete/{newsId}', ['uses' =>'newsController@delete', 'as'=>'delete_news']);
            Route::get('/edit/{newsId}',  ['uses' =>'adminController@edit', 'as'=>'edit']);
            Route::post('/edit/{newsId}', ['uses' =>'newsController@editor', 'as'=>'edit']);
            Route::get('/adminNewsView',  ['uses' =>'adminController@adminNewsView', 'as'=>'adminNewsView']);
        });
        Route::post('/slider',['uses' =>'sliderController@add_element', 'as'=>'slider']);
        Route::get('/slider', ['uses' =>'sliderController@index', 'as'=>'slider']);
    });
    Route::group(['prefix'=>'/' , 'routeMiddleware'=>'individual'], function() {
        Route::get('/allusers',['uses'=>'homeController@allusers'])->name('allusers');
        Route::get('/allusers/follow/{userId}', ['uses'=>'homeController@follow'])->name('follow');
        Route::get('/allusers/unfollow/{userId}', ['uses'=>'homeController@unfollow'])->name('unfollow');
        Route::get('/followers', ['uses'=>'homeController@followers'])->name('followers');
        Route::get('/following', ['uses'=>'homeController@following'])->name('following');
        Route::get('/profileViewEdit', ['uses'=>'homeController@profileViewEdit'])->name('profileViewEdit');
        Route::post('/profileEdit', ['uses'=>'homeController@profileEdit'])->name('profileEdit');
        Route::get('/volunteer/{eventId}', ['uses'=>'eventController@volunteer'])->name('volunteer');
        Route::get('/disVolunteer/{eventId}', ['uses'=>'eventController@disVolunteer'])->name('disVolunteer');
        Route::get('/acceptVolunteer/{volunteerId}/{eventId}', ['uses'=>'eventController@acceptVolunteer'])
        ->name('acceptVolunteer');
        Route::get('/unAcceptVolunteer/{volunteerId}/{eventId}', ['uses'=>'eventController@unAcceptVolunteer'])
        ->name('unAcceptVolunteer');
        Route::get('/myUpComingEvents', ['uses'=>'homeController@myUpComingEvents'])->name('myUpComingEvents');
        Route::get('/myArchiveEvents', ['uses'=>'homeController@myArchiveEvents'])->name('myArchiveEvents');
    });
    Route::group(['prefix'=>'institute','routeMiddleware'=>'institute'], function() {
        Route::get('/findVolunteers',['uses'=>'instituteController@findVolunteers'])->name('findVolunteers');
        Route::get('/allusers/follow/{userId}', ['uses'=>'instituteController@follow']);
        Route::get('/allusers/unfollow/{userId}', ['uses'=>'instituteController@unfollow']);
        Route::get('/followers', ['uses'=>'instituteController@followers'])->name('followersInstitute');
        Route::get('/following', ['uses'=>'instituteController@following'])->name('followingInstitute');
        Route::get('/makeEvent', ['uses'=>'instituteController@makeEvent'])->name('makeEvent');
        Route::post('/event', ['uses'=>'instituteController@eventInstitute'])->name('eventInstitute');
        Route::get('/eventDelete/{eventId}', ['uses'=>'instituteController@eventDelete'])->name('eventDelete');
        Route::get('/eventVeiwEdit/{eventId}', ['uses'=>'instituteController@eventVeiwEdit'])->name('eventVeiwEdit');
        Route::post('/eventEdit', ['uses'=>'instituteController@eventEdit'])->name('eventEdit');
        Route::get('/myEvents', ['uses'=>'instituteController@myEvents'])->name('myEvents');
        Route::get('/archiveMyEvents', ['uses'=>'instituteController@archiveMyEvents'])->name('archiveMyEvents');
    });
});
Route::get('/upComingEvents', ['uses'=>'mainController@upComingEvents'] )->name('upComingEvents');
Route::get('/allLocal', ['uses'=>'mainController@allLocal'])->name('allLocal');
Route::get('/allEvents', ['uses'=>'mainController@allEvents'])->name('allEvents');
Route::get('/archiveEvents', ['uses'=>'mainController@archiveEvents'])->name('archiveEvents');
Route::get('/event/{eventId}', ['uses'=>'mainController@event'])->name('event');
