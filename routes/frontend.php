<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'namespace' => 'App\Http\Controllers\Frontend',
],function () {
    Route::resource('/registration','CustomerController');
    Route::resource('/matching','MatchingSaleController');
    Route::resource('/withdraw','WithdrawController');
    Route::post('/get-refferal','CustomerController@getCustomer');
    Route::post('/get-package','PackageController@getPackage');
    Route::get('/pin-verify','PinVerificationController@index');
    Route::get('/profile','ProfileController@index');
    Route::post('/profile','ProfileController@update')->name('frontend.profile');
    Route::post('/pin-verify','PinVerificationController@pinVerify')->name('pin_verify');
    Route::get('/tree/{id}','TreeController@index');
    Route::get('/test/xyz','TestController@index');
    Route::get('/sale_count_all','MatchingSaleController@saleCount');

});