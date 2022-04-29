<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'namespace' => 'App\Http\Controllers\Frontend',
],function () {
    Route::resource('/registration','CustomerController');
    Route::post('/get-refferal','CustomerController@getCustomer');
});