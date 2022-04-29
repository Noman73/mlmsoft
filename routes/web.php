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
include('frontend.php');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\Admin\AdminHomeController::class, 'index']);

Route::group([
    "prefix"=>"admin",
    'namespace' => 'App\Http\Controllers\Admin\Auth',
],function () {
    Route::get('/login','LoginController@showLoginForm')->name('admin.login');
    Route::post('/login','LoginController@login')->name('admin.login');
    Route::post('/logout','LoginController@logout');
    Route::post('/login','LoginController@login');
});
Route::group([
    "prefix"=>"admin",
    'namespace' => 'App\Http\Controllers\Admin',
],function () {
    Route::resource('/customer','CustomerController');
    Route::get('/pin_generate','GeneratePinCodeController@index')->name('pin_generate.index');
    Route::post('/pin_generate','GeneratePinCodeController@store')->name('pin_generate.store');
    Route::get('/pin_generate/{id}','GeneratePinCodeController@edit')->name('pin_generate.edit');
    Route::post('/pin_generate/{id}','GeneratePinCodeController@update')->name('pin_generate.update');
    Route::delete('/pin_generate/{id}','GeneratePinCodeController@update')->name('pin_generate.destroy');
    Route::post('/get-customer','CustomerController@getCustomer');
});