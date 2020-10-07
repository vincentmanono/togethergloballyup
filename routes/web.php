<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::get('/','PageController@index')->name('index');
Route::get('/about','PageController@about')->name('about');
Route::get('/services','PageController@services')->name('services');
Route::get('/contact','PageController@contact')->name('contact');
Route::post('/contact','PageController@send')->name('contact.send');
Route::get('/blog','PageController@blog')->name('blog');
Route::get('/faq','PageController@faq')->name('faq');
Route::get('/testimonial','PageController@testimonial')->name('testimonial');
Route::post('/subscribe', 'SubscribeController@subscribe')->name('subscribe');

Route::get('oauth/{driver}', 'Auth\SocialiteController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialiteController@handleProviderCallback')->name('social.callback');

Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
    Route::post('search-chama',"ChamaController@searchChama")->name('chama.search');
    Route::get('auth-chama-search/{code}',"ChamaController@authchama")->name('auth.chama.search');
    Route::get('/chamas', 'ChamaController@index')->name('admin.chama');
    Route::get('/chamas/{chama}', 'ChamaController@show')->name('admin.chama.show');
    Route::put('/chamas/{chama}', 'ChamaController@update')->name('admin.chama.update');
    Route::get('/chama/create', 'ChamaController@create')->name('user.chama.create');
    Route::post('/chama/store', 'ChamaController@store')->name('user.chama.store');
    Route::post('join-chama', 'ChamaController@authjoinchama')->name('user.chama.join');
    Route::post('exit-chama', 'ChamaController@exitChama')->name('user.chama.exit');
    Route::get('/subscribed-chama', 'ChamaController@subscribedChama')->name('user.chama.subscribed');
    Route::get('/subscribed-chama/{chama}', 'ChamaController@singleSubscribedChama')->name('user.chama.subscribed.single');

    Route::get('/subscribed-chama/{chama}/vote', 'ChamaController@takevote')->name('user.chama.subscribed.vote');
    // Route::post('/subscribed-chama/{chama}/vote', 'TicketController@voted')->name('user.chama.subscribed.voted');

    Route::get('/wallet', 'WalletController@mywallet')->name('user.wallet');
    Route::post('/withdraw', 'WalletController@withdraw')->name('user.withdraw');


    Route::get('all-subscription','SubscriptionController@index')->name('user.all.subscription') ;
    Route::post('renew-subscription','SubscriptionController@renew')->name('user.renew.subscription') ;
    Route::post('deposite-to-wallet', 'WalletController@deposite')->name('deposte.to.wallet');

    Route::resource('profile', 'UserController');

    Route::resource('messages', 'MessageController');
    Route::resource('/testimonies','TestimonyController');
    //Route::resource('contact','PageController');

    Route::post('activate-chama/{chama}', 'ChamaController@activateChama')->name('admin.activate.chama');

    Route::group(['prefix' => 'admin','middleware'=>['admin']], function () {


        Route::post('activate-join/{chama}','AdminChamaController@activateJoin')->name('activate.join');
        Route::post('deactivate-join/{chama}','AdminChamaController@deactivateJoin')->name('deactivate.join');
        Route::post('chama-code-modify/{chama}','AdminChamaController@chamaCodeModify')->name('chama.code.modify');
        Route::get('share-codes/{chama}','AdminChamaController@sharecode')->name('share.code.compose');
        Route::get('my-chamas', 'AdminChamaController@allmychama')->name('admin.allmychama');
        Route::get('my-chamas/{chama}', 'AdminChamaController@show')->name('admin.allmychama.show');
        Route::put('my-chamas/{chama}', 'AdminChamaController@openvoting')->name('admin.allmychama.openvoting');
        Route::delete('/chamas/{chama}', 'ChamaController@destroy')->name('admin.chama.destroy');


        Route::post('my-chamas', 'AdminChamaController@removeUser')->name('admin.allmychama.removeUser');



    });


});

Route::group(['middleware' => ['auth','super']], function () {



    Route::prefix('power')->group(function(){
        Route::get('/', 'AdminPageController@dashboard')->name('admin.dashboard');
        Route::get('/mpesa-all-transactions', 'PaymentController@transactions')->name('admin.mpesa.all');
        Route::get('/mpesa-transactions/{mpesa}', 'PaymentController@show')->name('admin.mpesa.show');
        Route::get('/mpesa/query-request', 'PaymentController@query_request')->name('admin.mpesa.query');
        Route::get('/mpesa/completed', 'PaymentController@completed')->name('admin.mpesa.completed');
        Route::get('/mpesa/cancelled', 'PaymentController@cancelled')->name('admin.mpesa.cancelled');

        Route::get('/groups-admins', 'AdminPageController@groupsAdmins')->name('admin.groupsAdmins');
        Route::get('/chama-admins', 'AdminPageController@chamaAdmins')->name('admin.chamaAdmins');
        Route::get('/testimonies', 'AdminPageController@testimonies')->name('admin.testimonies');
        Route::get('all-subscription','SubscriptionController@index')->name('admin.all.subscription') ;
        Route::get('all-active-subscription','SubscriptionController@active_subscriptions')->name('admin.active.subscription') ;
        Route::get('/mysubscriptions', 'SubscribeController@index')->name('admin.mysubscriptions');

        Route::get('/super-admins', 'AdminPageController@super')->name('admin.all.super');
        Route::get('/super-admins/{email}', 'AdminPageController@supersingle')->name('admin.single.super');

        Route::get('/all-users', 'UserController@index')->name('admin.users.index');
        Route::get('/user/{email}', 'UserController@show')->name('admin.users.show');
        Route::get('/users/create', 'UserController@create')->name('admin.users.create');
        Route::post('/user/store', 'UserController@store')->name('admin.users.store');
    });

});
