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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web']], function () {
    Route::prefix('power')->group(function(){
        Route::get('/', 'AdminPageController@dashboard')->name('admin.dashboard');
        Route::get('/chamas', 'GroupController@index')->name('admin.chama');

        Route::get('/mpesa-all-transactions', 'AdminPageController@mpesaAll')->name('admin.mpesa.all');
<<<<<<< HEAD
        Route::get('/groups-admins', 'AdminPageController@groupsAdmins')->name('admin.groupsAdmins');
      
      
=======
        Route::get('/chama-admins', 'AdminPageController@chamaAdmins')->name('admin.chamaAdmins');
        Route::get('/testimonies', 'AdminPageController@testimonies')->name('admin.testimonies');
>>>>>>> c7719ce41f39656a56c31acc1c0838c06bde44b5
    });

    Route::resource('messages', 'MessageController');
    Route::resource('/testimonies','TestimonyController');

});

