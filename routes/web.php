<?php

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
Route::get('/blog','PageController@blog')->name('blog');
Route::get('/faq','PageController@faq')->name('faq');
Route::get('/testimonial','PageController@testimonial')->name('testimonial');
Route::post('/subscribe', 'SubscribeController@subscribe')->name('subscribe');

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/chamas', 'ChamaController@index')->name('admin.chama');
    Route::get('/chamas/{chama}', 'ChamaController@show')->name('admin.chama.show');
    Route::put('/chamas/{chama}', 'ChamaController@update')->name('admin.chama.update');
    Route::get('/chama/create', 'ChamaController@create')->name('user.chama.create');
    Route::post('/chama/store', 'ChamaController@store')->name('user.chama.store');
    Route::post('join-chama', 'ChamaController@chamaJoin')->name('user.chama.join');
    Route::post('exit-chama', 'ChamaController@exitChama')->name('user.chama.exit');
    Route::get('/subscribed-chama', 'ChamaController@subscribedChama')->name('user.chama.subscribed');
    Route::get('/subscribed-chama/{chama}', 'ChamaController@singleSubscribedChama')->name('user.chama.subscribed.single');
    Route::get('all-subscription','SubscriptionController@index')->name('user.all.subscription') ;
    Route::post('renew-subscription','SubscriptionController@renew')->name('user.renew.subscription') ;
    Route::get('/token', 'SubscriptionController@token')->name('token');

    Route::post('deposite-to-wallet', 'WalletController@deposite')->name('deposte.to.wallet');


});

Route::group(['middleware' => ['auth','super']], function () {



    Route::prefix('power')->group(function(){
        Route::get('/', 'AdminPageController@dashboard')->name('admin.dashboard');
        Route::delete('/chamas/{chama}', 'ChamaController@destroy')->name('admin.chama.destroy');
        Route::get('/mpesa-all-transactions', 'AdminPageController@mpesaAll')->name('admin.mpesa.all');
        Route::get('/groups-admins', 'AdminPageController@groupsAdmins')->name('admin.groupsAdmins');
        Route::get('/chama-admins', 'AdminPageController@chamaAdmins')->name('admin.chamaAdmins');
        Route::get('/testimonies', 'AdminPageController@testimonies')->name('admin.testimonies');
        Route::get('all-subscription','SubscriptionController@index')->name('admin.all.subscription') ;
        Route::get('all-active-subscription','SubscriptionController@active')->name('admin.active.subscription') ;
    });
    Route::resource('messages', 'MessageController');
    Route::resource('/testimonies','TestimonyController');

});
