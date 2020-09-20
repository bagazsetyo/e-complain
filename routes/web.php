<?php

// use Illuminate\Support\Facades\Route;

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


Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/user_manual', 'DashboardController@manual')->name('user_manual');
Route::resource('/home', 'DashboardController');
// ----cetak pdf----
Route::get('/pdf/{id}', 'DashboardController@pdf')->name('pdf');
Route::get('/cetakpdf/{id}', 'DashboardController@cetakpdf')->name('cetakpdf');

Route::get('officer', 'AuthController@officer')->name('officer');
Route::get('community', 'AuthController@community')->name('community');
Route::get('list/{id}', 'ComplainsController@list')->name('list');

Route::resource('/auth', 'AuthController');


Route::group(['middleware' => ['auth','Role:admin,officer']],function(){
        Route::get('user_register', 'AuthController@create')->name('registers');
        Route::get('authtrash', 'AuthController@authtrash')->name('authtrash');
        Route::get('authundo/{id}', 'AuthController@undo')->name('authundo');
        Route::get('authforcedelete/{id}', 'AuthController@force')->name('authforcedelete');
        // Route::get('editauth', 'AuthController@editauth')->name('editauth');
        Route::get('complainindex', 'ComplainsController@index')->name('complainindex');
        Route::get('details/{id}', 'ComplainsController@details')->name('details');
        Route::get('setstatus/{id}', 'ComplainsController@setStatus')->name('setstatus');
        Route::delete('destroy/{id}', 'ComplainsController@destroy')->name('destroy');
});

Route::group(['middleware' => ['auth','Role:public']],function(){

        Route::resource('complain', 'ComplainsController');
        Route::get('complaintrash/{id}', 'ComplainsController@complaintrash')->name('complaintrash');
        Route::get('complainundo/{id}', 'ComplainsController@undo')->name('complainundo');
        Route::get('complainforce/{id}', 'ComplainsController@force')->name('complainforce');

        Route::resource('galleries', 'GalleriesController');
        Route::get('picture/{id}', 'GalleriesController@picture')->name('picture');
});

Auth::routes();



