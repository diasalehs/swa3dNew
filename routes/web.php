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
Route::group(['prefix'=>'','routeMiddleware'=>'talk'], function()
{

//-------------------------------- on the main page - for all - guest inclouded --------------------------------\\
Route::get('/profile', function () {return view('profile');})->name('profile');
Route::get('/upComingEvents', ['uses'=>'mainController@upComingEvents'] )->name('upComingEvents');
Route::get('/allEvents', ['uses'=>'mainController@allEvents'] )->name('Events');
Route::get('/allEvents/{event}', ['uses'=>'mainController@allEvents'])->name('allEvents');
Route::get('/archiveEvents', ['uses'=>'mainController@archiveEvents'])->name('archiveEvents');
Route::get('/event/{eventId}', ['uses'=>'mainController@event'])->name('event');
Route::get('/eventPosts/{eventId}', ['uses'=>'eventController@eventPosts'])->name('eventPosts');
Route::get('/eventReviews/{eventId}', ['uses'=>'eventController@eventReviews'])->name('eventReviews');
Route::get('/acceptedVolunteers/{eventId}', ['uses'=>'eventController@acceptedVolunteers'])->name('acceptedVolunteers');
Route::get('/unacceptedVolunteers/{eventId}', ['uses'=>'eventController@unacceptedVolunteers'])->name('unacceptedVolunteers');
Route::get('/rateVolunteers/{eventId}', ['uses'=>'eventController@rateVolunteers'])->name('rateVolunteers');

Route::post('/post', ['uses'=>'postController@create'])->name('post');


Route::get('/', ['uses'=>'mainController@main','as'=>'main']);
Route::get('/researchView/{researchID}',['uses'=>'mainController@researchView','as'=>'researchView']);
Route::get('/researchView/download/{researchID}',['uses'=>'mainController@download','as'=>'download']);
Route::get('/view/{newsId}',  ['uses' =>'newsController@view', 'as'=>'view']);
Route::get('/allNews',  ['uses' =>'newsController@allNews', 'as'=>'allNews']);
Route::get('/allResearches',  ['uses' =>'mainController@allResearches', 'as'=>'allResearches']);
Route::get('/allResearches/results',  ['uses' =>'mainController@Researches_search', 'as'=>'Researches_search']);
Route::get('/results/',  ['uses' =>'searchController@basic', 'as'=>'search']);
Route::get('/results/filter',  ['uses' =>'searchController@basicSearch', 'as'=>'basicSearch']);

Route::get('/profile/{userId}',  ['uses' =>'profilesController@index', 'as'=>'profile']);
Auth::routes();
Route::post('/allRegister', ['uses'=>'registerStep2Controller@allRegister','as'=>'allRegister']);
Route::get('/step', ['uses'=>'stepController@step','as'=>'step']);
Route::get('/choose', ['uses'=>'chooseController@choose','as'=>'choose']);
Route::post('/registerer', function(\Illuminate\Http\Request $request) {
    return view('auth/register',['user_type'=>$request['submit']]);
})->name('registerer');

Route::get('/errorPage', function() {return view('errorPage');})->name('errorPage');
Route::get('/goBack', function() {return redirect()->back()->back();})->name('goBack');
Route::get('/initiativeProfile', function() {return view('initiativeProfile');})->name('initiativeProfile');

//-------------------------------- just for users - auth --------------------------------\\
Route::group(['prefix'=>'','routeMiddleware'=>'auth'], function()
{
    Route::get('/followers', ['uses'=>'followController@followers'])->name('followers');
    Route::get('/following', ['uses'=>'followController@following'])->name('following');
    Route::get('/closeProfile', ['uses'=>'profilesController@closeProfile'])->name('closeProfile');
    Route::get('/openProfile', ['uses'=>'profilesController@openProfile'])->name('openProfile');
    Route::get('/closeEvent/{eventId}', ['uses'=>'eventController@closeEvent'])->name('closeEvent');
    Route::get('/openEvent/{eventId}', ['uses'=>'eventController@openEvent'])->name('openEvent');
    Route::post('/review/{eventId}', ['uses'=>'lessonsController@review'])->name('review');
    Route::post('/lesson/{eventId}', ['uses'=>'lessonsController@lesson'])->name('lesson');
    Route::post('/availability', ['uses'=>'profilesController@availability'])->name('availability');

    Route::group(['prefix'=>'home','routeMiddleware'=>'auth'], function()
    {
        Route::group(['middleware' => ['isVerified']], function ()
        {

            Route::get('/', 'homeController@index')->name('home');

            //-------------------------------- event --------------------------------\\
            Route::get('/event/{eventId}/accept_volunteers', ['uses'=>'mainController@accept_volunteers'])->name('accept_volunteers');
            Route::get('/makeEvent', ['uses'=>'eventController@makeEvent'])->name('makeEvent');
            Route::post('/makeEvent', ['uses'=>'eventController@makeEventPost'])->name('makeEventPost');
            Route::post('/acceptVolunteer/{eventId}', ['uses'=>'eventController@acceptVolunteer'])
                ->name('acceptVolunteer');
            Route::post('/unAcceptVolunteer/{eventId}', ['uses'=>'eventController@unAcceptVolunteer'])
            ->name('unAcceptVolunteer');
            Route::get('/eventDelete/{eventId}', ['uses'=>'eventController@eventDelete'])->name('eventDelete');
            Route::get('/eventEdit/{eventId}', ['uses'=>'eventController@eventEdit'])->name('eventEdit');
            Route::post('/eventEdit', ['uses'=>'eventController@eventEditPost'])->name('eventEditPost');
            Route::get('/myEvents', ['uses'=>'eventController@myEvents'])->name('myEvents');
            Route::get('/archiveMyEvents', ['uses'=>'eventController@archiveMyEvents'])->name('archiveMyEvents');

            //-------------------------------- messenger --------------------------------\\
            Route::get('/message/{receiverId?}', ['uses'=>'homeController@message'])->name('message');
            Route::post('/sendMessage/{receiverId?}', ['uses'=>'homeController@sendMessage'])->name('sendMessage');
            Route::get('/messenger/{email?}', ['uses'=>'messageController@messenger'])->name('messenger');
            Route::post('/sendMessage', ['uses'=>'messageController@sendMessage'])->name('sendMessage');
            Route::get('/message/{messageId}', ['uses'=>'messageController@message'])->name('message');

            //-------------------------------- admin --------------------------------\\
            Route::group(['prefix'=>'admin' , 'routeMiddleware'=>'admin'], function()
            {
                Route::get('/userdelete/{userId}', ['uses' =>'adminController@delete', 'as'=>'delete_user']);
                Route::group(['prefix'=>'news','routeMiddleware'=>'admin'], function()
                {
                    Route::get('/',  ['uses' =>'adminController@indexx', 'as'=>'news']);
                    Route::post('/', ['uses' =>'newsController@Create', 'as'=>'news']);
                    Route::get('/approve', ['uses' =>'adminController@approveNews', 'as'=>'approveNews']);
                    Route::get('/delete/{newsId}', ['uses' =>'newsController@delete', 'as'=>'delete_news']);
                    Route::get('/edit/{newsId}',  ['uses' =>'adminController@edit', 'as'=>'edit']);
                    Route::post('/edit/{newsId}', ['uses' =>'newsController@editor', 'as'=>'edit']);
                    Route::get('/adminNewsView',  ['uses' =>'adminController@adminNewsView', 'as'=>'adminNewsView']);
                    Route::get('/approve/{id}', ['uses' =>'adminController@approve', 'as'=>'approve']);

                });

                Route::get('/adminVerify/{userID}', ['uses' =>'adminController@adminVerify', 'as'=>'adminVerify']);
                Route::post('/slider',['uses' =>'sliderController@add_element', 'as'=>'slider']);
                Route::get('/slider', ['uses' =>'sliderController@index', 'as'=>'slider']);
            });

            //-------------------------------- individual --------------------------------\\
            Route::group(['prefix'=>'/' , 'routeMiddleware'=>'individual'], function() {
                //-------------------------------- researcher --------------------------------\\
                Route::get('/myResearches', ['uses'=>'IndividualsController@myResearches'])->name('myResearches');
                Route::get('/researcher',['uses'=>'IndividualsController@researcher'])->name('researcher');
                Route::get('/addresearch',['uses'=>'IndividualsController@addResearch'])->name('addResearch');
                Route::post('/addresearch',['uses'=>'IndividualsController@submitResearch'])->name('addResearch');

                Route::get('/join/{userId}', ['uses'=>'initiativeController@join'])->name('join');
                Route::get('/disjoin/{userId}', ['uses'=>'initiativeController@disjoin'])->name('disjoin');

                Route::get('/makeInitiative', ['uses'=>'IndividualsController@makeInitiative'])->name('makeInitiative');
                Route::post('/makeInitiative', ['uses'=>'IndividualsController@makeInitiativePost'])->name('makeInitiativePost');
                Route::get('/myInitiatives', ['uses'=>'IndividualsController@myInitiatives'])->name('myInitiatives');
                Route::get('/editInitiative/{initiativeId}', ['uses'=>'IndividualsController@editInitiative'])->name('editInitiative');
                Route::post('/editInitiative/{initiativeId}', ['uses'=>'IndividualsController@editInitiativePost'])->name('editInitiativePost');
            });

            //-------------------------------- institute --------------------------------\\
            Route::group(['prefix'=>'institute','routeMiddleware'=>'institute'], function() {
                Route::get('/allNews',  ['uses' =>'instituteController@index', 'as'=>'instituteNews']);
                Route::get('/myNews',  ['uses' =>'newsController@myNews', 'as'=>'myNews']);
                Route::post('/', ['uses' =>'newsController@CreateNews', 'as'=>'createNews']);
                Route::get('/{newsId}',  ['uses' =>'instituteController@edit', 'as'=>'editMyNews']);
                Route::post('/{newsID}', ['uses' =>'newsController@editMynews', 'as'=>'editMynews']);

            });


            //-------------------------------- Initiative --------------------------------\\
            Route::group(['prefix'=>'initiative','routeMiddleware'=>'initiative'], function() {
                Route::get('/editInitiative/{initiativeId}', ['uses'=>'IndividualsController@editInitiative'])->name('editInitiative');
                Route::post('/editInitiative/{initiativeId}', ['uses'=>'IndividualsController@editInitiativePost'])->name('editInitiativePost');
                Route::post('/acceptJoin/{userId}', ['uses'=>'initiativeController@acceptJoin'])
                ->name('acceptJoin');
                Route::post('/unAcceptJoin/{userId}', ['uses'=>'initiativeController@unAcceptJoin'])
                ->name('unAcceptJoin');

            });

            Route::post('/invite/{userId?}', ['uses'=>'eventController@invite'])->name('invite');
            Route::get('/volunteer/{eventId}', ['uses'=>'eventController@volunteer'])->name('volunteer');
            Route::get('/disVolunteer/{eventId}', ['uses'=>'eventController@disVolunteer'])->name('disVolunteer');
            Route::get('/myUpComingEvents', ['uses'=>'IndividualsController@myUpComingEvents'])->name('myUpComingEvents');
            Route::get('/myArchiveEvents', ['uses'=>'IndividualsController@myArchiveEvents'])->name('myArchiveEvents');
        });
    });


    Route::get('/follow/{userId}', ['uses'=>'followController@follow'])->name('follow');
    Route::get('/unfollow/{userId}', ['uses'=>'followController@unfollow'])->name('unfollow');
    Route::get('/profileViewEdit', ['uses'=>'homeController@profileViewEdit'])->name('profileViewEdit');
    Route::post('/profileEdit', ['uses'=>'homeController@profileEdit'])->name('profileEdit');
    Route::get('/allusers',['uses'=>'homeController@allusers'])->name('allusers');
    Route::get('/volunteersSearch', ['uses' =>'searchcontroller@volunteersSearch', 'as'=>'volunteersSearch']);
    Route::get('/findVolunteers',['uses'=>'homeController@findVolunteers'])->name('findVolunteers');
    Route::get('/institutes',['uses'=>'mainController@institutes'])->name('institutes');

});

Route::post('/qualification/add', ['uses'=>'qualificationController@create'])->name('addQualification');
Route::get('/qualification/{qualificationId}/destroy', ['uses'=>'qualificationController@destroy'])->name('deleteQualification');
Route::get('/eventRank/{eventId}', ['uses'=>'profilesController@rateInstitute'])->name('rateInstitute');
Route::POST('/eventRate/{eventId}',  ['uses' =>'profilesController@rate'])->name('rate');




});
