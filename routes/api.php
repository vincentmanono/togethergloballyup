<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/subscribed-chama/{chama}/vote', 'TicketController@voted')->name('user.chama.subscribed.voted');


Route::any('/handle-result', 'SubscriptionController@handle_result')->name('handle_subscription_result_api');

Route::any('/handle-timeout', "SubscriptionController@time_out_url")->name('handle_QueueTimeOutURL');

Route::any('/handle-deposite-result', 'WalletController@handle_result')->name('handle_deposite_result_api');


Route::any('/handle-chama-activate-result', 'ChamaController@handle_result')->name('handle_chama_activation_result_api');

Route::any('/handle-withdraw-result', 'WalletController@withdraw_result')->name('handle_withdraw_resultresult_api');
