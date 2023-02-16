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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products/tokengen', function(){
    return redirect('https://tokengen.info/');
     })->name('tokengen.index');

     Route::get('/support', function(){
    return view('support');
    })->name('support');

Route::get('/policy/privacy', function(){
    return view('policies.privacy');
});
Route::get('/policy/tokengen/eula', function(){
    return view('policies.eula');
});

Route::post('/support', 'GeneralController@SupportRequest')->name('support.request'); 

Auth::routes();
Route::group(['middleware' => ['auth']], function(){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/payment/checkout', 'HomeController@checkout')->name('payment.checkout');
    Route::post('/payment/submit', 'HomeController@submitCheckout')->name('payment.submit');
    Route::post('/payment/confirm', 'HomeController@confirm')->name('payment.confirm');
    Route::get('/invoice/list', 'HomeController@invoice')->name('invoice.list');
    Route::get('/invoice/get', 'HomeController@getlistdata')->name('invoice.listget');
    Route::get('/payment/complete', 'HomeController@complete')->name('payment.complete');
});
