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

Auth::routes();

Route::get('logout',function (){
   \Illuminate\Support\Facades\Auth::logout();
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{provider}/login', 'Auth\SocialProviderController@redirect');
Route::get('/{provider}/callback', 'Auth\SocialProviderController@callback');

Route::get('complete-registration','Auth\RegisterController@completeRegistration');
